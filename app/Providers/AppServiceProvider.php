<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
// use Blade;
use URL;

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
        /*
            Make Your Url Force Https 
        */
        // URL::forceScheme('https');
        //

        /*
            Bootstrap Pagination Style
        */
        Paginator::useBootstrap();
        //

        /***
            Blade Directive , example using : @example or @example('expression') 
         ***/

        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });
    }
}
