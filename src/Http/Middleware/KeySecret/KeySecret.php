<?php

namespace Swingtree\LaravelUtils\Middleware\KeySecret;

use Swingtree\LaravelUtils\Helpers\Api\ErrorMessages as Err;
use Closure;
use Illuminate\Support\Facades\App;
use Swingtree\LaravelUtils\Middleware\Base\AbstractSwingtreeMiddleware;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class KeySecret
 * This middleware handles key secret restrictions
 *
 * @package App\Http\Middleware\Base
 */
class KeySecret extends AbstractSwingtreeMiddleware {

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @param  string|null $keyPair
   *
   * @return mixed
   */
  public function handle($request, Closure $next, $keyPair = NULL) {

    //IF no keypair defined,
    // developer responsibility through testing to solve this
    if (empty($keyPair)) {
      return $this->abort(Response::HTTP_INTERNAL_SERVER_ERROR, Err::KEYSECRET__AUTHORITY_NOT_DEFINED);
    }

    // Put the key pair in uppercase to reflect env
    $keyPair = strtoupper($keyPair);
    $key = env('KS_'.$keyPair.'_KEY');

    // IF the requested keypair not found in env
    // developer responsibility through testing to solve this
    if( empty($key)){
      return $this->abort(Response::HTTP_INTERNAL_SERVER_ERROR, Err::KEYSECRET__AUTHORITY_NOT_SET);
    }

    // Do not sent cache control headers on testing.
    // Fails phpUnits
    if( !App::environment('testing')){
      header('Cache-Control: no-cache, must-revalidate, max-age=0');
    }

    // Check validity
    $has_supplied_credentials = $request->headers->has('php-auth-user') && $request->headers->has('php-auth-pw');
    if( !$has_supplied_credentials){
      return $this->abort(Response::HTTP_UNAUTHORIZED, Err::KEYSECRET__AUTHORITY_MISSING);
    }


    $is_not_authenticated = (
      !$has_supplied_credentials ||
      $request->headers->get('php-auth-user') != $key ||
      $request->headers->get('php-auth-pw') != env('KS_'.$keyPair.'_SECRET')
    );

    // Unabled to match key pair with request
    if ($is_not_authenticated) {
      return $this->abort(Response::HTTP_UNAUTHORIZED, Err::KEYSECRET__AUTHORITY_UNKNOWN);
    }

    return $next($request);
  }
}
