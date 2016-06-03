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
        '/reactie/*',
        '/projecten/filter',
        '/api/comments/place/*',
        '/api/addcoins/*',
        '/api/addXP/*',
        '/api/addLevel',
        '/rankImage/*',
        '/multiplier/*',
        '/addPoints/*',
        '/removePoints/*'
    ];
}
