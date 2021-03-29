<?php

namespace App\Http\Middleware;

use App\School;
use Closure;

class CheckRequestHostName
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, School $school)
    {
        if(request()->getHost() === $school->host || request()->getHost() === $school->host_alternative){
            config([
                'app.timezone' => 'Africa/Lagos',
                'app.name' => $school->school_name,
            ]);
        }
        return $next($request);
    }
}
