<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CategoryType extends Enum
{
    const Music = 0;
    const Concerts = 1;
    const Plays = 2;
    const Exhibitions = 3;
    const Sports = 4;
    const CareersAndBussiness = 5;
    const Learning = 6;
    const ForKids = 7;
    const OutdoorAndAdventures = 8;
    const Arts = 9;
    const FoodAndDrinks = 10;
    const HealthAndFitness = 11;
    const Entertainment = 12;

    public static function getDescription($value): string
    {
        // do not write symbols like &,. etc in return values
        if ($value === self::CareersAndBussiness) {
            return 'Careers and Bussiness';
        }

        if ($value === self::OutdoorAndAdventures) {
            return 'Outdoor and Adventures';
        }

        if ($value === self::FoodAndDrinks) {
            return 'Food and Drinks';
        }

        if ($value === self::HealthAndFitness) {
            return 'Health and Fitness';
        }

        return parent::getDescription($value);
    }
}
