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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'ayfie' => [
        'translate_url' => env('AYFIE_TRANSLATE_URL', 'https://portal.ayfie.com/api/translate'),
        'key' => env('AYFIE_KEY', 'hVEOiUUKWgjNmFYEXHpImRlEabTuggwUfItMTxeXvpJIeISweo'),
    ],

    'pspdfkit' => [
        'key' => env('PSPDFKIT_KEY', 'pdf_live_od7QGeAmpoKlm0Yepd7VJm3IQLMDf1fSdovZJwPOL5Z'),
        'second_key' => env('PSPDFKIT_SECOND_KEY', 'pdf_live_VmL1zNZAt5fYleVK7mBcBoWxDSunxicV05vaYWRCz9N'),
    ],

];
