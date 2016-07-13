<?php namespace Laralist\Listcurl;

use Illuminate\Support\ServiceProvider;

class ListCurlServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app['listcurl'] = $this->app->share(function($app){
            return new Listcurl;
        });

        $this->app->booting(function(){
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Listcurl', 'Laralist\Listcurl\Facades\Listcurl');
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('listcurl');
    }
}

