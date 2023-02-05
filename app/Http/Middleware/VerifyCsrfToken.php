<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    // protected $except = [
    //     //
    // ];

    protected $except = [
        'https://laravel.layouti.com/api/frontend/sayHello',
        'https://laravel.layouti.com/api/frontend/hireUs',
        'http://laravel.layouti.com/api/frontend/sayHello',
        'http://laravel.layouti.com/api/frontend/hireUs',
        'http://laravel.layouti.com/api/frontend/*',
        'https://laravel.layouti.layouti.com/api/frontend/*',
        'http://laravel.layouti.com/api/dashboard/login',
        'https://laravel.layouti.com/api/dashboard/login',
        'https://laravel.layouti.com/api/dashboard/*',
        'https://laravel.layouti.layouti.com/api/*',
        'https://laravel.layouti.com/*',
        'http://laravel.layouti.com/api/dashboard/*',
        'http://laravel.layouti.com/api/*',
        'http://laravel.layouti.com/*',
    ];
}
