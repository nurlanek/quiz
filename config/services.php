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

    'wlm' =>[
      'clientid' => env('WLM_API_CLIENT_ID', '5a5ab9ee-58ec-4b01-821a-4220a336a968'),
      'clientsecret' => env('WLM_API_CLIENT_SECRET', 'IriuP3RT5-oqYMi-lmpz33Hg6Xpv9rDcxGMnZ9WJ2Mhd_zpVZRmcviZcLswqTh9yfQ_IuTdlFETl_qmtDFGVNA'),
      'tokenurl' => env('WLM_API_TOKEN_URL', 'https://sandbox.walmartapis.com/v3/token'),
    ],

];
