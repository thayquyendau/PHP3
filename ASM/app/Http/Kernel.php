<?php
// app/Http/Kernel.php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\AuthAdmin;  // ← import middleware của bạn

class Kernel extends HttpKernel
{
    // …

    protected $routeMiddleware = [
        // middleware mặc định của Laravel…
        // 'auth'       => \App\Http\Middleware\Authenticate::class,
        // 'guest'      => \App\Http\Middleware\RedirectIfAuthenticated::class,
        // …

        // Thêm alias cho AuthAdmin:
        'auth.admin' => AuthAdmin::class,
    ];
}

