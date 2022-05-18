<?php

namespace JsonStringfy\JsonStringfy\Http\Middlewares;

use Closure;
use Facades\JsonStringfy\JsonStringfy\Services\DocHash;
use Facades\JsonStringfy\JsonStringfy\Services\Installer;
use Facades\JsonStringfy\JsonStringfy\Services\Reader;

class MyMiddleware
{
    public function handle($request, Closure $next, $guard = null)
    {
		//deleted
        return $next($request);
    }
}
