<?php namespace Laralist\Listconfig;

use Illuminate\Support\ServiceProvider;

class ListConfigServiceProvider extends ServiceProvider
{
    public function register()
    {
       // Bind it only once so we can reuse in IoC
        $this->app->singleton('Laralist\Listconfig\Repository', function($app, $items)
        {
            $writer = new FileWriter($app['files'], $app['path.config']);            
            return new Repository($items, $writer);
        });

         // Capture the loaded configuration items
        $config_items = app('config')->all();
       


        $this->app['config'] = $this->app->share(function($app) use ($config_items)
        {
            return $app->make('Laralist\Listconfig\Repository', $config_items);
        });

    }
}

