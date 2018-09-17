<?php

namespace Swingtree\LaravelUtils\Middleware\Optional;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class NoFailMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if( $request->query->has('no-fail') ){
          if( $response->status() !== 200 ){
            $response->setStatusCode(Response::HTTP_MULTI_STATUS);
          }
        }
        
        return $response;
    }
}
