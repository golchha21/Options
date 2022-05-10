<?php

use Golchha21\Options\Models\Option;

if (! function_exists('option')) {
    /**
     * Get / set the specified key-value option.
     *
     * @param array|string|null $key
     * @param bool $set
     * @return mixed|Option
     */
    function option($key = null, bool $set = false): mixed
    {
        if (is_null($key)) {
            return false;
        }

        if ($set) {
            return app('option')->set($key);
        }

        return app('option')->get($key);
    }
}

if (! function_exists('option_exists')) {
    /**
     * Check whether the specified key-value option exits.
     *
     * @param string $key
     * @return mixed
     */
    function option_exists(string $key): mixed
    {
        return app('option')->exists($key);
    }
}

if (! function_exists('option_remove')) {
    /**
     * Remove the specified key-value option.
     *
     * @param string $key
     * @return mixed
     */
    function option_remove(string $key): mixed
    {
        return app('option')->remove($key);
    }
}
