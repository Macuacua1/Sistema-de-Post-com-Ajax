<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '1183477868398039',
        'client_secret' => 'e459bc164ee124cbeb5768a2acf2ddef',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
    'twitter' => [
        'client_id' => 'XOsc9JrVDJJHNW65iRmvb9Tz7',
        'client_secret' => '566dqO7pXngf0xB34UlnuZvwbIdrlnWtdB6WP8dsfks5T2Lt9x',
        'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],
    'google' => [
        'client_id' => '498642651855-0cenc3pfd9gicge8fv9vsk9b1t5p6b34.apps.googleusercontent.com',
        'client_secret' => 'Re18f9E5hYuhnD5hwNdHsXaw',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

];
