<?php namespace Arcanedev\Html\Elements;

/**
 * Class     Ol
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Ol extends ListElement
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    protected $tag = 'ol';

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Make an item.
     *
     * @param  mixed  $value
     * @param  array  $attributes
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
