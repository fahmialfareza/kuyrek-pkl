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
      'client_id' => '2181057002175649',
      'client_secret' => 'e03decea87fb36f297a5e9fe372be9ee',
      'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'google' => [
      'client_id' => '130162106359-df000mjcotjpd2j9g0quavsovq6ash8m.apps.googleusercontent.com',
      'client_secret' => 'XCD0rPCZwZqWybUHVB1pEpZk',
      'redirect' => 'http://localhost:8000/auth/google/callback',
    ],
];
