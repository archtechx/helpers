<?php

declare(strict_types=1);

if (! function_exists('uses_trait')) {
    /** Check if a class or an object uses the specified trait. */
    function uses_trait(object|string $class, string $trait): bool
    {
        return in_array($trait, class_uses_recursive($class), true);
    }
}

if (! function_exists('is_simple_array')) {
    /** Checks if a variadic array only has one element that's an array.
     * @example [['foo', 'bar']] is a simple array
     * @example [['foo'], ['bar']] is not a simple array
     */
    function is_simple_array(array $variadicArray): bool
    {
        return count($variadicArray) === 1 && isset($variadicArray[0]) && is_array($variadicArray[0]);
    }
}

if (! function_exists('variadic_array')) {
    /** Converts [[a]] into [a] and [a, b] into [a, b] */
    function variadic_array(array $items): array
    {
        if (is_simple_array($items)) {
            $items = $items[0];
        }

        return $items;
    }
}

// todo test
if (! function_exists('array_without')) {
    /** Remove value(s) from an array */
    function array_without(array $array, mixed ...$values): array
    {
        foreach (variadic_array($values) as $value) {
            if (($key = array_search($value, $array)) !== false) {
                unset($array[$key]);
            }
        }

        return $array;
    }
}
