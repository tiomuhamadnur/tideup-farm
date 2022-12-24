<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    
    'google' => [
        'client_id' => '62614591741-grl2kfl3ruh6t3ovi1v1i97hvbnl2fl0.apps.googleusercontent.com', //USE FROM Google DEVELOPER ACCOUNT
        'client_secret' => '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', //USE FROM Google DEVELOPER ACCOUNT
        'redirect' => 'https://farm.tideup.tech/auth/google/callback'
    ],

];