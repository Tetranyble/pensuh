<?php

namespace App\Providers;

use App\Classes;
use App\School;
use App\Services\Schools;
use Illuminate\Support\ServiceProvider;

class SchoolServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Schools::class, function($app){
            //$school = School::whereDomain($app['config']->get('app.url'))->first();
            $school = School::whereDomain(request()->getHost())->first();
            dd($school);
            if ($school){
                return new Schools($school);
            }
        });
    }
}
