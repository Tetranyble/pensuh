<?php

namespace App\Http\Middleware;

use App\School;
use Closure;

class HandleSchools
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $schools = School::get();
        //, $request->fullUrl(), $request->getSchemeAndHttpHost(), $request->root();$request->getHost()

        if (in_array($request->getHost(), $schools->pluck('domain')->toArray())) {
            $request->headers->set('X_REWRITE_URL',  $request->getHost() . '.'. parse_url(env('APP_URL'), PHP_URL_HOST) . $this->getRedirectPath($request));

        }

        return $next($request);
    }

    private function getRedirectPath( $request): string
    {
        return $request->path() . ($request->getQueryString() ? '?' . $request->getQueryString() : '');

    }
}
