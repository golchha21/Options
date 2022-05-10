<?php

namespace Golchha21\Options\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var [type]
     */
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Determine if the given key-value exists.
     *
     * @param string $key
     * @return bool
     */
    public function exists(string $key): bool
    {
        return self::where('key', $key)->exists();
    }

    /**
     * Get the specified key-value.
     *
     * @param string $key
     * @return mixed
     */
    public function get(string $key): mixed
    {
        $value = null;
        if ($option = self::where('key', $key)->first()) {
            $value = $option;
        }

        return $value;
    }

    /**
     * Set a given set of key-value.
     *
     * @param array|string $key
     * @param mixed|null $value
     * @return void
     */
    public function set($key, mixed $value = null): void
    {
        $keys = is_array($key) ? $key : [$key => $value];

        foreach ($keys as $key => $value) {
            self::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }

    /**
     * Delete the specified key-value.
     *
     * @param string $key
     * @return bool
     */
    public function remove(string $key): bool
    {
        return (bool) self::where('key', $key)->delete();
    }
}
