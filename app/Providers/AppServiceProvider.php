<?php

namespace App\Providers;

use App\Classes;
use App\Services\Schools;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! app()->runningInConsole()) {
            view()->share(['classes' => Classes::whereSchoolId(Schools::schoolId())->get(), 'home' => $home = Schools::schools()]);
        }

    }
}
