# Laravel Dutch postal code (postcode) lookup
[![PHP from Packagist](https://img.shields.io/packagist/php-v/chabter/laravel-dutch-postalcode-lookup.svg)](https://packagist.org/packages/chabter/laravel-dutch-postalcode-lookup)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/chabter/laravel-dutch-postalcode-lookup.svg)](https://packagist.org/packages/chabter/laravel-dutch-postalcode-lookup)
[![Software License](https://img.shields.io/packagist/l/chabter/laravel-dutch-postalcode-lookup.svg)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/chabter/laravel-dutch-postalcode-lookup.svg)](https://packagist.org/packages/chabter/laravel-dutch-postalcode-lookup)

This package is a [Laravel](https://laravel.com) wrapper of [Nationaal Georegister provider for Geocoder PHP](https://github.com/swisnl/geocoder-php-nationaal-georegister-provider), which can be used to lookup a postal code to return the corresponding street and city. 

The publicly available [PDOK Locatieserver v3 (Dutch)](https://www.pdok.nl/diensten#PDOK%20Locatieserver) is utilized to provide the necessary geodata.

## Installation

This package requires PHP 7.4 and Laravel 6.0 or higher. Use composer to install this package:

```bash
$ composer require chabter/laravel-dutch-postalcode-lookup
```

## Usage
Perform a lookup by postal code:
```php
PostalCodeLookupService::lookup('1012JS');
```

Or perform a lookup by a postal code and house number combination:
```php
PostalCodeLookupService::lookup('1012JS', 1);
```

The lookup method also supports using house number extensions as follows:
```php
PostalCodeLookupService::lookup('1012JS', '5B');
```

### Response
The lookup method returns a `Chabter\PostalCodeLookup\Models\Address` model on success, for example:
```php
$address->getPostalCode() => '1012JS';
$address->getHouseNumber() => 1; // or string including housenumber extension
$address->getStreet() => 'Dam';
$address->getCity() => 'Amsterdam';
```

## Testing
Run the tests with:
```bash
$ composer test
```

## Postcardware

This package is completely free to use. If it makes it to your production environment we would highly appreciate you sending us a postcard from your hometown! 👏🏼

Our address is: Chabter, Kanaalstraat 12B, 5347KM Oss, Netherlands.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
