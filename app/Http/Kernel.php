<?php

// app/Http/Kernel.php

protected $middlewareGroups = [
    'api' => [
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \App\Http\Middleware\ApiResponseMiddleware::class, 
    ],
];

protected $routeMiddleware = [
    'role' => \App\Http\Middleware\CheckRole::class,
];
