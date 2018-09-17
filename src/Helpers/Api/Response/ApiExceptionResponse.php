<?php

namespace Swingtree\LaravelUtils\Helpers\Api\Response;


class ApiExceptionResponse {

  /**
   * @param $status
   * @param $message
   * @param array $susbstitutes
   *
   * @return array
   */
  public static function create($status, $message, $susbstitutes = []) {
    return [
      'error' => [
        'code' => $status,
        'message' => $message,
        'substitutes' => $susbstitutes,
      ],
    ];
  }

}