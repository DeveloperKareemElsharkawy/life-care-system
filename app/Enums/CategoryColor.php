<?php

namespace App\Enums;


use phpDocumentor\Reflection\Types\Self_;

enum CategoryColor: string
{

    case white = '#ffffff';
    case black = '#000000';
    case teal = '#008080';
    case green = '#008000';
    case lime = '#00FF00';
    case yellow = '#FFFF00';
    case orange = '#FFA500';
    case red = '#FF0000';
    case pink = '#FF00FF';
    case purple = '#800080';
    case indigo = '#4B0082';
    case azure = '#F0FFFF';

    public static function getColor(string $color)
    {
        return constant(self::class . '::' . $color);
    }
}
