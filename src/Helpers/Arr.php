<?php namespace Arcanedev\Html\Helpers;

use Illuminate\Support\Collection;

/**
 * Class     Arr
 *
 * @package  Arcanedev\Html\Helpers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Arr
{
    /**
     * Return an array of enabled values. Enabled values are either:
     *   - Keys that have a truthy value;
     *   - Values that don't have keys.
     *
     * @param  iterable  $array
     *
     * @return array
     */
    public static function getToggledValues($array)
    {
        return Collection::make($array)
            ->transform(function ($condition, $value) {
                return is_numeric($value)
                    ? $condition
                    : ($condition ? $value : null);
            })
            ->filter()
            ->toArray();
    }

    /**
     * Map the item with key & value.
     *
     * @param  iterable  $array
     * @param  \Closure  $callback
     *
     * @return array
     */
    public static function map($array, $callback)
    {
        $result = [];

        foreach ($array as $key => $value) {
            $result[$key] = $callback($value, $key);
        }

        return $result;
    }

    /**
     * Map with keys the items.
     *
     * @param  iterable  $array
     * @param  \Closure  $callback
     *
     * @return array
     */
    public static function mapWithKeys($array, $callback)
    {
        $result = [];

        foreach ($array as $key => $value) {
            foreach ($callback($value, $key) as $mapKey => $mapValue) {
                $result[$mapKey] = $mapValue;
            }
        }

        return $result;
    }
}
