<?php

namespace App\Providers;

use App\Classes;
use App\Services\SchoolManager;
use App\Services\Schools;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SchoolViewServiceProvider extends ServiceProvider
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

        if (! app()->runningInConsole()) {
            View::composer('*', function ($view) {
                $view->with(['home' => Schools::schools(), 'classes' => Classes::whereSchoolId(Schools::schoolId())->get()]);
            });
        }
    }
}
