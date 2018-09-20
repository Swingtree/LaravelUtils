<?php

namespace Swingtree\LaravelUtils;

use Illuminate\Support\ServiceProvider;

class LaravelUtilsServiceProvider extends ServiceProvider
{

  /**
   * Bootstrap services.
   *
   * @param \Illuminate\Routing\Router $router the bloblo
   *
   * @return void
   */
    public function boot(\Illuminate\Routing\Router $router)
    {
      $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
