<?php

namespace Swingtree\LaravelUtils\Middleware\Base;

use Closure;
use Swingtree\LaravelUtils\Helpers\Api\Response\ApiExceptionResponse;

abstract class AbstractSwingtreeMiddleware
{
    abstract public function handle($request, Closure $next);

  /**
   * Abort an api call with approriate informations
   * @param int $status
   * @param string $message
   * @param array $substitutes
   *
   * @return \Illuminate\Http\JsonResponse
   */
    protected function abort($status, $message, $substitutes=[]){
//      if( App::environment('production') ){
//        // Option 1 : Show to anyone that we require authentication
//        //    header('HTTP/1.1 401 Authorization Required');
//        //    header('WWW-Authenticate: Basic realm="Access denied"');
//
//        // Option 2 : Fails the request because of missing required auth
//        //    return response('HTTP/1.1 401 Authorization Required',401);
//
//        // Option 3 : send an empty success response. Obfuscate the requirements
//        return response()->json([]);
//      }else{
//        return response()->json(['m'=>$message,'s'=>$status],$status);
//      }

      return response()->json( ApiExceptionResponse::create($status,$message,$substitutes), $status );

    }
}
