<?php

return [
    'path' => env('FILAMENT_PATH', 'admin'),
    
    'domain' => env('FILAMENT_DOMAIN'),
    
    'home_url' => '/',
    
    'brand' => env('APP_NAME'),
    
    'auth' => [
        'guard' => env('FILAMENT_AUTH_GUARD', 'web'),
        'pages' => [
            'login' => \Filament\Pages\Auth\Login::class,
        ],
    ],

    'pages' => [
        'namespace' => 'App\\Filament\\Pages',
        'path' => app_path('Filament/Pages'),
        'register' => [
            \App\Filament\Pages\Dashboard::class,
        ],
    ],

    'widgets' => [
        'namespace' => 'App\\Filament\\Widgets',
        'path' => app_path('Filament/Widgets'),
        'register' => [
        ],
    ],

    'resources' => [
        'namespace' => 'App\\Filament\\Resources',
        'path' => app_path('Filament/Resources'),
    ],

    'layout' => [
        'forms' => [
            'actions' => [
                'alignment' => 'left',
            ],
        ],
    ],
]; 