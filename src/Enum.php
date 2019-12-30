<?php

namespace MiladRahimi\Enum;

use ReflectionClass;
use ReflectionException;

abstract class Enum
{
    /**
     * All the items declared in enum
     *
     * @var array
     */
    protected static $items = [];

    /**
     * Get all the items in the enum
     *
     * @return array
     */
    public static function all(): array
    {
        try {
            return static::$items ?: static::$items = (new ReflectionClass(static::class))->getConstants();
        } catch (ReflectionException $e) {
            return [];
        }
    }

    /**
     * Get all the declared keys
     *
     * @return array
     */
    public static function keys(): array
    {
        return array_keys(static::all());
    }

    /**
     * Get all the declared values
     *
     * @return array
     */
    public static function values(): array
    {
        return array_values(static::all());
    }

    /**
     * Check if the given key declared in the enum or not
     *
     * @param string $key
     * @return bool
     */
    public static function hasKey(string $key): bool
    {
        return array_key_exists($key, static::all());
    }

    /**
     * Check if the given value declared in the enum or not
     *
     * @param mixed $value
     * @return bool
     */
    public static function hasValue($value): bool
    {
        return in_array($value, static::all());
    }

    /**
     * Get value of the given key
     *
     * @param $key
     * @param mixed|null $default
     * @return mixed|null
     */
    public static function valueOf($key, $default = null)
    {
        return static::all()[$key] ?? $default;
    }

    /**
     * Get related keys of the given value
     *
     * @param $value
     * @return array
     */
    public static function keysOf($value): array
    {
        $keys = [];

        foreach (static::all() as $k => $v) {
            $v == $value && ($keys[] = $k);
        }

        return $keys;
    }
}