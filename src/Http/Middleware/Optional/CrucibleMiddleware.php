<?php

namespace Swingtree\LaravelUtils\Middleware\Optional;


use Closure;
use Swingtree\LaravelUtils\Helpers\Crucible\Crucible;

class CrucibleMiddleware {

  const HEADER_NAME = 'X-Crucible';

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   *
   * @return mixed
   */
  public function handle($request, Closure $next) {

    $response = $next($request);

    // If a crux parameter found
    if ($request->request->has('crux')) {
      $crucible = $request->request->get('crux');
      // Get its response
      $crucibleResponse = Crucible::decrypt($crucible);
      // And fill the request with it
      $response->headers->add([self::HEADER_NAME=>$crucibleResponse]);
    }

    return $response;
  }
}
