<?php

namespace Ddrcha\Easyfield;

use Illuminate\Support\ServiceProvider;


class EasyfieldServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

		$this->loadViewsFrom(__DIR__.'/views/'.config('easyfield.templates'), 'easyfield');

		$this->publishes([
			__DIR__.'/easyfield.php' => config_path('easyfield.php'),
		], 'config');

		$this->publishes([
			__DIR__.'/views/materialize' => resource_path('views/vendor/easyfield'),
		], 'materialize');

		$this->publishes([
			__DIR__.'/views/bootstrap5' => resource_path('views/vendor/easyfield'),
		], 'bootstrap5');



    }


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {


		$this->app->bind('easyfield', function($app)
		{
			return new Libraries\Easyfield;
		});


    }

}
