<?php

namespace JsonStringfy\JsonStringfy\Http\Middlewares;

use Closure;
use Facades\JsonStringfy\JsonStringfy\Services\Installer;

class WhatToCheck
{
    public function handle($request, Closure $next)
    {
		return $next($request);
    }
}
