<?php

return [

    // Account statuses
    'statuses' => [
        'new',
        'expected',
        'tested',
        'confirmed',
    ],

    'statuses_ru' => [
        'новый',
        'возможный',
        'тест',
        'подтвержден',
    ],

    // Session limits (UTC Time)
    'sessions' => [
        'first' => [
            'start' => '08:00',
            'end' => '12:00',
        ],
        'second' => [
            'start' => '18:00',
            'end' => '22:00',
        ]
    ],

    // Maximum times for user change its account timetable
    'user_change_limit' => 2,

    // Minimum amount for withdraw per country
    'min_withdraw' => [
        'RU' => '100',
        'UA' => '200',
        'KZ' => '1000',
        'BY' => '1000',
    ]

];
