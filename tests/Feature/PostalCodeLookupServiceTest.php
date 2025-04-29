<?php

namespace Chabter\PostalCodeLookup\Tests\Feature;

use Chabter\PostalCodeLookup\Facades\PostalCodeLookupService;
use Chabter\PostalCodeLookup\Tests\TestCase;

class PostalCodeLookupServiceTest extends TestCase
{
    public function testValidAndFormattedPostalCodeLookupReturnsValidValues()
    {
        // Arrange
        $postalCode = $this->validAndFormattedPostalCode;

        // Act
        $result = PostalCodeLookupService::lookup($postalCode);

        // Assert
        $this->assertNotNull($result);
        $this->assertEquals($postalCode, $result->getPostalCode());
        $this->assertNull($result->getHouseNumber());
        $this->assertNotNull($result->getStreet());
        $this->assertNotNull($result->getCity());
        $this->assertNotNull($result->getCoordinates());
    }

    public function testValidAndFormattedPostalCodeWithHouseNumberLookupReturnsValidValues()
    {
        // Arrange
        $postalCode = $this->validAndFormattedPostalCode;
        $houseNumber = $this->validHouseNumber;

        // Act
        $result = PostalCodeLookupService::lookup($postalCode, $houseNumber);

        // Assert
        $this->assertNotNull($result);
        $this->assertEquals($postalCode, $result->getPostalCode());
        $this->assertEquals($houseNumber, $result->getHouseNumber());
        $this->assertNotNull($result->getStreet());
        $this->assertNotNull($result->getCity());
        $this->assertNotNull($result->getCoordinates());
    }

    public function testValidAndFormattedPostalCodeWithHouseNumberAndExtensionLookupReturnsValidValues()
    {
        // Arrange
        $postalCode = $this->validAndFormattedPostalCode;
        $houseNumber = $this->validAndFormattedHouseNumberAndExtension;

        // Act
        $result = PostalCodeLookupService::lookup($postalCode, $houseNumber);

        // Assert
        $this->assertNotNull($result);
        $this->assertEquals($postalCode, $result->getPostalCode());
        $this->assertEquals($houseNumber, $result->getHouseNumber());
        $this->assertNotNull($result->getStreet());
        $this->assertNotNull($result->getCity());
        $this->assertNotNull($result->getCoordinates());
    }

    public function testValidAndUnformattedPostalCodeLookupReturnsValidValues()
    {
        // Arrange
        $postalCode = $this->validAndFormattedPostalCode;

        // Act
        $result = PostalCodeLookupService::lookup($postalCode);

        // Assert
        $this->assertNotNull($result);
        $this->assertEquals($postalCode, $result->getPostalCode());
        $this->assertNull($result->getHouseNumber());
        $this->assertNotNull($result->getStreet());
        $this->assertNotNull($result->getCity());
        $this->assertNotNull($result->getCoordinates());
    }

    public function testValidAndUnformattedPostalCodeWithHouseNumberLookupReturnsValidValues()
    {
        // Arrange
        $postalCode = $this->validAndUnformattedPostalCode;
        $houseNumber = $this->validHouseNumber;
        $expectedPostalCode = $this->validAndFormattedPostalCode;
        $expectedHouseNumber = $this->validHouseNumber;

        // Act
        $result = PostalCodeLookupService::lookup($postalCode, $houseNumber);

        // Assert
        $this->assertNotNull($result);
        $this->assertEquals($expectedPostalCode, $result->getPostalCode());
        $this->assertEquals($expectedHouseNumber, $result->getHouseNumber());
        $this->assertNotNull($result->getStreet());
        $this->assertNotNull($result->getCity());
        $this->assertNotNull($result->getCoordinates());
    }

    public function testValidAndUnformattedPostalCodeWithHouseNumberAndExtensionLookupReturnsValidValues()
    {
        // Arrange
        $postalCode = $this->validAndUnformattedPostalCode;
        $houseNumber = $this->validAndUnformattedHouseNumberAndExtension;
        $expectedPostalCode = $this->validAndFormattedPostalCode;
        $expectedHouseNumber = $this->validAndFormattedHouseNumberAndExtension;

        // Act
        $result = PostalCodeLookupService::lookup($postalCode, $houseNumber);

        // Assert
        $this->assertNotNull($result);
        $this->assertEquals($expectedPostalCode, $result->getPostalCode());
        $this->assertEquals($expectedHouseNumber, $result->getHouseNumber());
        $this->assertNotNull($result->getStreet());
        $this->assertNotNull($result->getCity());
        $this->assertNotNull($result->getCoordinates());
    }

    public function testInvalidPostalCodeLookupReturnsNull()
    {
        // Arrange
        $postalCode = $this->invalidPostalCode;

        // Act
        $result = PostalCodeLookupService::lookup($postalCode);

        // Assert
        $this->assertNull($result);
    }

    public function testInvalidPostalCodeWithHouseNumberLookupReturnsNull()
    {
        // Arrange
        $postalCode = $this->invalidPostalCode;
        $houseNumber = $this->invalidHouseNumber;

        // Act
        $result = PostalCodeLookupService::lookup($postalCode, $houseNumber);

        // Assert
        $this->assertNull($result);
    }
}
