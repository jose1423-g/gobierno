<?php

return [
    'name' => 'Alumbrado Publico',
    'manifest' => [
        'name' => env('APP_NAME', 'Alumbrado Publico'),
        'short_name' => 'Luminarias',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => '/images/icons/logo_gobierno.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/images/icons/icon-logo_gobierno.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/images/icons/logo_gobierno.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/images/icons/logo_gobierno.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/images/icons/logo_gobierno.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/images/icons/logo_gobierno.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/images/icons/logo_gobierno.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/images/icons/logo_gobierno.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/images/icons/logo_gobierno.png',
            '750x1334' => '/images/icons/logo_gobierno.png',
            '828x1792' => '/images/icons/logo_gobierno.png',
            '1125x2436' => '/images/icons/logo_gobierno.png',
            '1242x2208' => '/images/icons/logo_gobierno.png',
            '1242x2688' => '/images/icons/logo_gobierno.png',
            '1536x2048' => '/images/icons/logo_gobierno.png',
            '1668x2224' => '/images/icons/logo_gobierno.png',
            '1668x2388' => '/images/icons/logo_gobierno.png',
            '2048x2732' => '/images/icons/logo_gobierno.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Concentrado',
                'description' => 'Concentrado',
                'url' => '/read',
                'icons' => [
                    "src" => "/images/icons/logo_gobierno.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Crear censo',
                'description' => 'crear censo',
                'url' => '/'
            ]
        ],
        'custom' => []
    ]
];
