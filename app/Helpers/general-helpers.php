<?php

use App\Helpers\ArrayHelper;

if (!function_exists('resourceGet')) {
  /**
   * @param  object|array  $resource
   * @param  array|\Closure|string  $key
   * @param  mixed|null  $default
   *
   * @return mixed
   */
  function resourceGet(object|array $resource, array|Closure|string $key, mixed $default = null): mixed
  {
    return ArrayHelper::getValue($resource, $key, $default);
  }
}

