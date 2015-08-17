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
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key'    => 'AKIAIJUUWXPOSJI5PWGA',
        'secret' => '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',
        'region' => 'us-west-2',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => '',
        'secret' => '',
    ],

	'vkontakte' => [
		'client_id' => 5033696,
		'client_secret' => 'fwSEus56DwIECfN9zqAy',
		'redirect' => 'http://portfolio.local/auth/vkontakte/callback',
	],

	'facebook' => [
		'client_id' => 463958047119630,
		'client_secret' => '6f3c9ea410c7a0ec5f91048c3c817f27',
		'redirect' => 'http://portfolio.local/auth/facebook/callback',
	],

];
