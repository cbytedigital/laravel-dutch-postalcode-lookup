<?php

namespace Chabter\PostalCodeLookup\Models;

use Geocoder\Location;
use Geocoder\Model\Coordinates;

class Address
{
    /**
     * @var null|string
     */
    private $street;

    /**
     * @var int|string|null
     */
    private $houseNumber;

    /**
     * @var null|string
     */
    private $postalCode;

    /**
     * @var null|string
     */
    private $city;

    /**
     * @var null|Coordinates
     */
    private $coordinates;

    /**
     * Address constructor.
     * @param Location $location
     */
    private function __construct(Location $location)
    {
        $this->street = $location->getStreetName();
        $this->houseNumber = $location->getStreetNumber();
        $this->postalCode = $location->getPostalCode();
        $this->city = $location->getLocality();
        $this->coordinates = $location->getCoordinates();
    }

    public static function fromLocation(Location $location)
    {
        return new self($location);
    }

    /**
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @return int|string|null
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @return Coordinates|null
     */
    public function getCoordinates(): ?Coordinates
    {
        return $this->coordinates;
    }
}
