<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Meta;

use App\Category;
use Route;


class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.countrylist', function($view){
            $countries = DB::table('countries')->take(5)->get();
            $view->with('countryList',$countries);
        });

        view()->composer('*', function ($view) {

           
        $current_route_name = Route::currentRouteName(); //\Request::route()->getName();

        $view->with('current_route_name', $current_route_name);

    });

        /* Set default meta tags*/
        
        Meta::meta('title', 'Laralist');
        Meta::meta('description', 'Laralist');
        Meta::meta('keywords', 'Laralist,classified,laravel,ads');
       
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
