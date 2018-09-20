<?php

namespace Swingtree\LaravelUtils;

use Illuminate\Database\Eloquent\Model;
use Swingtree\LaravelUtils\Helpers\Uuid\UuidTrait;

class DownloadIdentity extends Model {

  use UuidTrait;

  //

  /**
   * Indicates if the IDs are auto-incrementing.
   *
   * @var bool
   */
  public $incrementing = FALSE;

}
