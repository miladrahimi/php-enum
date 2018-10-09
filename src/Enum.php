<?php

namespace MiladRahimi\PhpEnum;

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
     * Get all items in the enum
     *
     * @return array
     */
    public static function items(): array
    {
        try {
            return static::$items ?: static::$items = (new ReflectionClass(static::class))->getConstants();
        } catch (ReflectionException $e) {
            return [];
        }
    }

    /**
     * Get all declared keys
     *
     * @return array
     */
    public static function keys(): array
    {
        return array_keys(static::items());
    }

    /**
     * Get all declared values
     *
     * @return array
     */
    public static function values(): array
    {
        return array_values(static::items());
    }

    /**
     * Is key declared in the enum
     *
     * @param string $key
     * @return bool
     */
    public static function hasKey(string $key): bool
    {
        return array_key_exists($key, static::items());
    }

    /**
     * Is value declared in the enum
     *
     * @param mixed $value
     * @return bool
     */
    public static function hasValue($value): bool
    {
        return in_array($value, static::items());
    }
}