<?php

namespace Chabter\PostalCodeLookup\Helpers;

class Format
{
    /**
     * @param string $postalCode
     * @return string
     */
    public static function postalCode(string $postalCode) : string
    {
        return self::format($postalCode);
    }

    /**
     * @param int|string $houseNumber
     * @return string
     */
    public static function houseNumber($houseNumber) : string
    {
        return ! is_int($houseNumber) ? self::format($houseNumber) : "$houseNumber";
    }

    /**
     * @param string $input
     * @return string
     */
    private static function format(string $input) : string
    {
        return strtoupper(preg_replace('/\s+/', '', $input));
    }
}
