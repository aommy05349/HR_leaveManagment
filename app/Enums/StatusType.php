<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class StatusType extends Enum
{
    const W = 0;
    const R = 1;
    const O = 2;
    const F = 3;
    const N = 4;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::W:
                return 'Working';
            case self::R:
                return 'Resign';
            case self::O:
                return 'Out of Contract';
            case self::F:
                return 'Fired';
            case self::N:
                return 'Not Pass Probation';

            break;
            default:
                return self::getKey($value);
        }
    }
}
