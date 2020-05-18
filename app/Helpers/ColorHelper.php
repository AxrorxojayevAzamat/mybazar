<?php

namespace App\Helpers;

class ColorHelper
{

    public static function getValidColor(string $color)
    {
        return self::rgba_to_hex($color);
    }

    public static function rgba_to_hex(string $rgba): string
    {
        if (strpos($rgba, '#') === 0) {
            return $rgba;
        }

        preg_match('/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i', $rgba, $by_color);

        return sprintf('#%02x%02x%02x', $by_color[1], $by_color[2], $by_color[3]);
    }
}
