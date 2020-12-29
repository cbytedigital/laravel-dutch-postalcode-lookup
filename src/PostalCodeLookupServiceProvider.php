<?php

namespace Chabter\PostalCodeLookup;

use Illuminate\Support\ServiceProvider;

class PostalCodeLookupServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('postalCodeLookupService', function ($app) {
            return new PostalCodeLookupService();
        });
    }

    public function boot()
    {
        //
    }
}
