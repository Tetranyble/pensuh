<?php

namespace App\Services;

use App\School;
use Closure;
use Illuminate\Http\Request;

abstract class IdentificationMiddleware
{


    /** @var Container */
    protected $container;

    protected $school;

    public function initializeStore( Request $request, Closure $next, $domain)
    {
        $this->school = School::whereHas('domains', function ($q) use ($domain) {
            $q->where('domain', $domain);})->with('domains')->firstOrFail();
        if ($this->school){
            $this->container->singleton(Schools::class, function ($app){
                return new Schools($this->school);
            });
        }

        return $next($request);
    }
}
