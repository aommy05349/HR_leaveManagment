<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PositionType extends Enum
{
    const MD = 0;
    const CA = 1;
    const PP = 2;
    const MP = 3;
    const FP = 4;
    const GD = 5;
    const QA= 6;
    const PM = 7;
    const S = 8;
    const H = 9;
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
            case self::MD:
                return 'Managing Director';
            case self::CA:
                return 'Company Administator';
            case self::PP:
                return 'PHP Programmer';
            case self::MP:
                return 'Mobile Programmer';
            case self::FP:
                return 'Frontend Programmer';
            case self::GD:
                return 'Grapphic Designer';
            case self::QA:
                return 'Quality Assurance';
            case self::PM:
                return 'Project Manager';
            case self::S:
                return 'Salesman';
            case self::H:
                return 'Housekeeping';
            
            break;
            default:
                return self::getKey($value);
        }
    }
}
