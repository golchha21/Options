<?php

namespace Golchha21\Options;


use Golchha21\Options\Models\Option;

class Options
{
    private const VERSION = '1.0.0';

    /**
     * Determine if the given key-value exists.
     *
     * @param string $key
     * @return bool
     */
    public static function exists(string $key): bool
    {
        $model = new Option();
        return $model->exists($key);
    }

    /**
     * Get the specified key-value.
     *
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $model = new Option();

        if ($option = $model->get($key)) {
            return $option->value;
        }

        return $default;
    }

    /**
     * Set a given key-value.
     *
     * @param array|string $key
     * @param mixed|null $value
     * @return void
     */
    public static function set($key, mixed $value = null): void
    {
        $model = new Option();
        $model->set($key, $value);
    }

    /**
     * Remove/delete the specified key-value.
     *
     * @param string $key
     * @return bool
     */
    public static function remove(string $key): bool
    {
        $model = new Option();
        return $model->remove($key);
    }
}
