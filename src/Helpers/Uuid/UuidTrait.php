<?php

namespace Swingtree\LaravelUtils\Helpers\Uuid;


use Webpatser\Uuid\Uuid;

trait UuidTrait {
  /**
   * Boot function from laravel.
   */
  protected static function boot()
  {
    parent::boot();

    static::creating(function ($model) {
      $key = $model->getKeyName();
      if (empty($model->{$key})) {
        $model->{$key} = Uuid::generate()->string;
      }
    });
  }
}