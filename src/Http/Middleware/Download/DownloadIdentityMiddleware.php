<?php

namespace Swingtree\LaravelUtils\Middleware\Download;

use Closure;
use Illuminate\Validation\UnauthorizedException;
use Swingtree\LaravelUtils\DownloadIdentity;
use Swingtree\LaravelUtils\Helpers\Api\Response\ApiExceptionResponse;
use Swingtree\LaravelUtils\Middleware\Base\AbstractSwingtreeMiddleware;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DownloadIdentityMiddleware
 * This middleware handles download links restrictions
 *
 * @package App\Http\Middleware\Base
 */
class DownloadIdentityMiddleware extends AbstractSwingtreeMiddleware {

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @param  string|null $type
   *
   * @return mixed
   * @throws \Symfony\Component\CssSelector\Exception\InternalErrorException
   */
  public function handle($request, Closure $next, $type = NULL) {
    if( empty($type)){
      throw new InternalErrorException('Download identity type not defined');
    }

    // @TODO: Log this
    $dlid = $request->route()->parameter('dlid');
    if( empty($dlid) ){
      return response('',Response::HTTP_UNAUTHORIZED);
    }

    $downloadId = DownloadIdentity::find($dlid);
    // @TODO: Log this
    if( empty($downloadId) ){
      return response('This download link has been outdated',Response::HTTP_UNAUTHORIZED);
    }

    // @TODO: Log this
    if( $downloadId->type != $type ){
      return response('This download link has not access to this download type',Response::HTTP_FORBIDDEN);
    }

    // Ok valid download link
    if( $downloadId->one_time ){
      $downloadId->delete();
    }

    return $next($request);
  }
}
