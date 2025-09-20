<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AutoTranslate;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Global middleware
        $middleware->append(AutoTranslate::class);

        // kalau mau khusus web group:
        // $middleware->group('web', [AutoTranslate::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
