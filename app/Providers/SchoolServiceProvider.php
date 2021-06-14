<?php

namespace App\Providers;

use App\Classes;
use App\School;
use App\Services\Schools;
use Illuminate\Support\ServiceProvider;
use LayerShifter\TLDExtract\Extract;

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
            $extract = new Extract();
            //$school = School::whereDomain($app['config']->get('app.url'))->first();
            $result = $extract->parse(request()->getHost());
            $school = School::where('domain',$result->getFullHost())->orWhere('alias',$result->getRegistrableDomain())->first();
            abort_unless($school, 404);
            return new Schools($school);
        });
    }
}
