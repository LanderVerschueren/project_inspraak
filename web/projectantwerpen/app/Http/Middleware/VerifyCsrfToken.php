<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/api/register',
        '/api/login',
        '/api/logout',
        '/api/user',
        '/reactie/*',
        '/projecten/filter',
        '/api/comments/place/*',
        '/api/addCoins/*',
        '/api/removeCoins/*',
        '/api/addXP/*',
        '/api/addLevel',
        '/api/rankImage/*',
        '/api/multiplier/*',
        '/addPoints/*',
        '/api/removePoints/*'
    ];
}
