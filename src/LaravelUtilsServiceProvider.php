<?php

namespace Swingtree\LaravelUtils;

use Illuminate\Support\ServiceProvider;

class LaravelUtilsServiceProvider extends ServiceProvider
{

  /**
   * Bootstrap services.
   *
   * @param \Illuminate\Routing\Router $router
   *
   * @return void
   */
    public function boot(\Illuminate\Routing\Router $router)
    {
      $router->aliasMiddleware('swt_ks', 'MiddlewareClass');
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
