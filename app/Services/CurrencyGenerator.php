<?php

namespace App\Services;

use Faker\Provider\cs_CZ\DateTime;

class CurrencyGenerator
{
    public static function generate(): array
    {
        $parsedCurrenciesList = [
            [
                'id' => 1,
                'name' => 'Bitcoin',
                'short_name' => 'BTC',
                'actual_course' => 6839.87,
                'actual_course_date' => '1531048816',
                'active' => true,
            ],
            [
                'id' => 1,
                'name' => 'Ethereum',
                'short_name' => 'ETH',
                'actual_course' => 494.335,
                'actual_course_date' => '1531048809',
                'active' => false,
            ],
            [
                'id' => 52,
                'name' => 'Ripple',
                'short_name' => 'XRP',
                'actual_course' => 0.493234,
                'actual_course_date' => '1531048802',
                'active' => true,
            ],
            [
                'id' => 1831,
                'name' => 'Bitcoin Cash',
                'short_name' => 'BCH',
                'actual_course' => 768.677,
                'actual_course_date' => '1531048817',
                'active' => false,
            ],
            [
                'id' => 1765,
                'name' => 'EOS',
                'short_name' => 'EOS',
                'actual_course' => 9.045,
                'actual_course_date' => '1531048816',
                'active' => true,
            ],
            [
                'id' => 2,
                'name' => 'Litecoin',
                'short_name' => 'LTC',
                'actual_course' => 85.3405,
                'actual_course_date' => '1531048801',
                'active' => false,
            ],
            [
                'id' => 512,
                'name' => 'Stellar',
                'short_name' => 'XLM',
                'actual_course' => 0.210575,
                'actual_course_date' => '1531048802',
                'active' => true,
            ],
        ];

        $currenciesList = [];
        foreach ( $parsedCurrenciesList as $c) {
            $currenciesList[] = new Currency(
                $c['id'],
                $c['name'],
                $c['short_name'],
                $c['actual_course'],
                new \DateTime(gmdate('d-m-Y', $c['actual_course_date'])),
                $c['active']
            );
        }

        return $currenciesList;
    }
}