# Laravel Dutch postal code (postcode) lookup
[![PHP from Packagist](https://img.shields.io/packagist/php-v/chabter/laravel-dutch-postalcode-lookup.svg)](https://packagist.org/packages/chabter/laravel-dutch-postalcode-lookup)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/chabter/laravel-dutch-postalcode-lookup.svg)](https://packagist.org/packages/chabter/laravel-dutch-postalcode-lookup)
[![Software License](https://img.shields.io/packagist/l/chabter/laravel-dutch-postalcode-lookup.svg)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/chabter/laravel-dutch-postalcode-lookup.svg)](https://packagist.org/packages/chabter/laravel-dutch-postalcode-lookup)

This package is a [Laravel](https://laravel.com) wrapper of [Nationaal Georegister provider for Geocoder PHP](https://github.com/swisnl/geocoder-php-nationaal-georegister-provider), which can be used to lookup a postal code to return the corresponding street and city. 

The publicly available [PDOK Locatieserver v3 (Dutch)](https://www.pdok.nl/diensten#PDOK%20Locatieserver) is utilized to provide the necessary geodata.

## Installation

Use composer to install this package:

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
$address->getCoordinates() => [ latitude: 0.0000, longitude: 0.0000 ];
```

## Testing
Run the tests with:
```bash
$ composer test
```

## Support

| Version | Laravel Version | PHP Version |
|---- |----|----|
| 2.x | 8.x | ^7.3\|^8.0 |
| 1.x | 7.x | \>=7.2 |

Version 1.x will also work with Laravel 8 if Guzzle 6 is available (`^6.5|7.0` in composer.json).

## Postcardware

This package is completely free to use. If it makes it to your production environment we would highly appreciate you sending us a postcard from your hometown! 👏🏼

Our address is: CBYTE Software B.V., Parallelweg 27, 5223AL 's-Hertogenbosch, Netherlands.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
