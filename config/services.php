<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
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

    // 'google' => [
    // 'client_id' => '648364957965-srcn7jabbj107j71mqnbidch68j46egu.apps.googleusercontent.com',
    // 'client_secret' => 'T0HwIKnIXS78nst6pWsJ1Uvv',
    // 'redirect' => 'http://articulus.frb.io/callback/google',
    // ],
    'google' => [
    'client_id' =>  '1086772092473-3tpu7crqlj6cbnnevoqe6bgitmgdekvu.apps.googleusercontent.com' ,
    'client_secret' => '7PCoEN3J7M7JaaYd--8sby05',
    'redirect' => 'http://localhost:8000/callback/google',
    ],
];
