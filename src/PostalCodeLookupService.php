<?php

namespace Chabter\PostalCodeLookup;

use Chabter\PostalCodeLookup\Helpers\Format;
use Exception;
use Geocoder\Collection;
use Http\Adapter\Guzzle6\Client;
use Geocoder\Query\GeocodeQuery;
use Http\Client\HttpClient;
use Swis\Geocoder\NationaalGeoregister\NationaalGeoregister;

/**
 * Class PostalCodeLookupService
 * @package Chabter\PostalCodeLookup
 */
class PostalCodeLookupService
{
    /**
     * @var NationaalGeoregister
     */
    private $geocoder;

    /**
     * @var string
     */
    const DELIMITER = ' ';

    /**
     * PostalCodeLookupService constructor.
     * @param HttpClient|null $client
     */
    public function __construct(HttpClient $client = null)
    {
        if (!$client) {
            $client = new Client();
        }

        $this->geocoder = new NationaalGeoregister($client, ['fq' => 'bron:BAG']);
    }

    /**
     * Accepts postal code and house number to lookup corresponding address
     *
     * @param string $postalCode
     * @param string|null $houseNumber
     * @return Models\Address|null
     */
    public function lookup(string $postalCode, ?string $houseNumber = null) : ?Models\Address
    {
        $postalCode = Format::postalCode($postalCode);
        if (! is_null($houseNumber)) {
            $houseNumber = Format::houseNumber($houseNumber);
        }

        $query = $this->createQuery($postalCode, $houseNumber);
        $result = $this->executeQuery($query);

        return $this->handleQueryResult($result, $postalCode, $houseNumber);
    }

    /**
     * Handle query return value
     * If not empty, check if return value matches the input
     *
     * @param ?Collection $result
     * @param string $postalCode
     * @param string|null $houseNumber
     * @return Models\Address|null
     */
    private function handleQueryResult(?Collection $result, string $postalCode, ?string $houseNumber = null) : ?Models\Address
    {
        if (! is_null($result)) {
            $location = collect($result->all())
                ->first(function ($location) use ($postalCode, $houseNumber) {
                    $values = $location->toArray();

                    return $values['postalCode'] === $postalCode &&
                        $values['streetNumber'] === $houseNumber;
                });

            if (! is_null($location)) {
                return Models\Address::fromLocation($location);
            }
        }

        return null;
    }

    /**
     * Ensures format of input strings matches that of API return value for comparison
     *
     * @param string $postalCode
     * @param string|null $houseNumber
     * @return GeocodeQuery
     */
    private function createQuery(string $postalCode, ?string $houseNumber) : GeocodeQuery
    {
        $queryString = is_null($houseNumber) ? $postalCode : $postalCode . static::DELIMITER . $houseNumber;

        return GeocodeQuery::create($queryString);
    }

    private function executeQuery(GeocodeQuery $query) : ?Collection
    {
        try {
            return $this->geocoder->geocodeQuery($query);
        } catch(Exception $e) {
            return null;
        }
    }
}
