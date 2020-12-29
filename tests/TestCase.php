<?php

namespace Chabter\PostalCodeLookup\Tests;

use Chabter\PostalCodeLookup\PostalCodeLookupServiceProvider;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected string $validAndFormattedPostalCode = '1012JS'; // Dam Square, Amsterdam
    protected string $validAndUnformattedPostalCode = '1012 js'; // Dam Square, Amsterdam
    protected string $invalidPostalCode = '0999 AA'; // Doesn't exist

    protected int $validHouseNumber = 1;
    protected string $validAndFormattedHouseNumberAndExtension = '5B';
    protected string $validAndUnformattedHouseNumberAndExtension = '5 b';
    protected string $invalidHouseNumber = '99abc';

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @param Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            PostalCodeLookupServiceProvider::class,
        ];
    }

    /**
     * Set up the environment.
     *
     * @param Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        //
    }
}
