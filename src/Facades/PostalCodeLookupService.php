<?php

namespace Chabter\PostalCodeLookup\Facades;

use Illuminate\Support\Facades\Facade;

class PostalCodeLookupService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'postalCodeLookupService';
    }
}
