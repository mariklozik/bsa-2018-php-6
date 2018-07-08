<?php

namespace App\Services;

class CurrencyPresenter
{
    public static function present(Currency $currency): array
    {
        return [
            'id'                    => $currency->getId(),
            'name'                  => $currency->getName(),
            'short_name'            => $currency->getShortName(),
            'actual_course'         => $currency->getActualCourse(),
            'actual_course_date'    => $currency->getActualCourseDate(),
            'is_active'             => $currency->isActive(),
        ];
    }
}