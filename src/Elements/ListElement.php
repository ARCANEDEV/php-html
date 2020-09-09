<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

/**
 * Class     ListElement
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class ListElement extends Element
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Add an item.
     *
     * @param  mixed  $value
     * @param  array  $attributes
     *
     * @return $this
     */
    public function item($value, array $attributes = [])
    {
        return $this->addChild($value, function ($value) use ($attributes) {
            return $this->makeItem($value, $attributes);
        });
    }

    /**
     * Add multiple items.
     *
     * @param  iterable  $items
     * @param  array     $attributes
     *
     * @return $this
     */
    public function items($items, array $attributes = [])
    {
        return $this->children($items, function ($value) use ($attributes) {
            $value = is_array($value)
                ? static::make()->items($value) // Create nested items
                : $value;

            return $this->makeItem($value, $attributes);
        });
    }

    /**
     * Make an item.
     *
     * @param  mixed  $value
     * @param  array  $attributes
     *
     * @return \Arcanedev\Html\Elements\Element
     */
    abstract protected function makeItem($value, array $attributes);
}
