<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ContractType extends Enum
{
    const P = 0;
    const F = 1;
    const I = 2;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::P:
                return 'Probation';
            case self::F:
                return 'Full time';
            case self::I:
                return 'Internship';
            break;
            default:
                return self::getKey($value);
        }
    }
}
