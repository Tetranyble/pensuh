<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class SchoolAdminServiceProvider extends ServiceProvider
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
        Blade::directive('hasschooladmin', function ($school) {
            //find current school with any elevated role
            if ($school->users){
                $condition = $school->users->map->roles->flatten()->pluck('slug')->contains('principal');
            }else{
                $condition = false;
            }

            return "<?php if ($condition) { ?>";
        });
        Blade::directive('noschoolsdmin', function () {
            return "<?php } else { ?>";
        });
        Blade::directive('endhasschooladmin', function () {
            return "<?php } ?>";
        });
    }
}
