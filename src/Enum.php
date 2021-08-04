<?php

namespace MiladRahimi\Enum;

use ReflectionClass;
use Throwable;

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
            if (isset(static::$items[static::class])) {
                return static::$items[static::class];
            }

            return static::$items[static::class] = (new ReflectionClass(static::class))->getConstants();
        } catch (Throwable $e) {
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

    /**
     * Get only the first related key of the given value
     *
     * @param $value
     * @param null $default
     * @return mixed|null
     */
    public static function keyOf($value, $default = null)
    {
        return static::keysOf($value)[0] ?? $default;
    }

    /**
     * Get a random key
     *
     * @return mixed
     */
    public static function randomKey()
    {
        return array_rand(static::all());
    }

    /**
     * Get a random key except given values
     *
     * @param array $values
     * @return array|int|string
     */
    public static function randomKeyExceptValues(array $values = [])
    {
        do {
            $key = array_rand(static::all());
        } while (in_array(static::all()[$key], $values));

        return $key;
    }

    /**
     * Get a random key except given keys
     *
     * @param array $keys
     * @return array|int|string
     */
    public static function randomKeyExceptKeys(array $keys = [])
    {
        do {
            $key = array_rand(static::all());
        } while (in_array($key, $keys));

        return $key;
    }

    /**
     * Get a random value
     *
     * @return mixed
     */
    public static function randomValue()
    {
        return static::all()[array_rand(static::all())];
    }

    /**
     * Get a random value except given values
     *
     * @param array $values
     * @return mixed
     */
    public static function randomValueExceptValues(array $values = [])
    {
        do {
            $value = static::all()[array_rand(static::all())];
        } while (in_array($value, $values));

        return $value;
    }

    /**
     * Get a random value except given keys
     *
     * @param array $keys
     * @return mixed
     */
    public static function randomValueExceptKeys(array $keys = [])
    {
        do {
            $key = array_rand(static::all());
        } while (in_array($key, $keys));

        return static::all()[$key];
    }
}
