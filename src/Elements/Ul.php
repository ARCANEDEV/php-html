<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

/**
 * Class     Ul
 *
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
