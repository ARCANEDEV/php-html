<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

/**
 * Class     Ol
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Ol extends ListElement
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string */
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
