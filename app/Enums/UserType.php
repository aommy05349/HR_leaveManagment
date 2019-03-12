<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserType extends Enum
{
    const ADMIN = 0;
    const EMPLOYEE = 1;
    // const OptionThree = 2;
    /**
     * Get the description for an enum value
     *
     * @param  string  $value
     * @return string
     */
    public static function getDescription($value): string
    {
        switch ($value) {
            case self::ADMIN:
                return 'ADMIN';
            case self::EMPLOYEE:
                return 'EMPLOYEE';
            break;
            default:
                return self::getKey($value);
        }
    }
}
