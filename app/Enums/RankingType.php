<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RankingType extends Enum
{
    const J = 0;
    const M = 1;
    const S = 2;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::J:
                return 'Junior';
            case self::M:
                return 'Middle';
            case self::S:
                return 'Senior';
           
            break;
            default:
                return self::getKey($value);
        }
    }
}
