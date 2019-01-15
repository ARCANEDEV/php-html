<?php namespace Arcanedev\Html\Elements;

/**
 * Class     Ul
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Ul extends ListElement
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    protected $tag = 'ul';

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Make an item.
     *
     * @param  mixed $value
     * @param  array $attributes
     *
     * @return \Arcanedev\Html\Elements\Element
     */
    protected function makeItem($value, array $attributes)
    {
        return Element::withTag('li')
            ->attributes($attributes)
            ->html($value);
    }
}
