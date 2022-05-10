<?php

namespace Golchha21\Options\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static set(string|array $key, mixed $value = null)
 * @method static get(string $key)
 * @method static remove(string $key)
 * @method static exists(string $key)
 */
class Option extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'option';
    }
}
