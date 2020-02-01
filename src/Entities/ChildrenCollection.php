<?php

declare(strict_types=1);

namespace Arcanedev\Html\Entities;

use Arcanedev\Html\Contracts\Renderable;
use Arcanedev\Html\Elements\HtmlElement;
use Arcanedev\Html\Exceptions\InvalidChildException;
use Illuminate\Support\{Collection, HtmlString};
use Illuminate\Contracts\Support\Htmlable;

/**
 * Class     ChildrenCollection
 *
 * @package  Arcanedev\Html\Entities
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ChildrenCollection extends Collection implements Renderable
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * @param  mixed          $children
     * @param  \Closure|null  $mapper
     *
     * @return static
     */
    public static function parse($children, $mapper = null)
    {
        return static::make($children)
            ->unless(is_null($mapper), function (ChildrenCollection $items) use ($mapper) {
                return $items->map($mapper);
            })
            ->each(function ($child) {
                if ( ! static::isValidChild($child))
                    throw new InvalidChildException;
            });
    }

    /**
     * Render the object as a string of HTML.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function render()
    {
        return new HtmlString($this->toHtml());
    }

    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        $mapper = function ($child): string {
            if (is_null($child))
                return '';

            if ($child instanceof Htmlable)
                return $child->toHtml();

            if (is_string($child) || $child instanceof HtmlString)
                return $child;

            throw new InvalidChildException;
        };

        return $this->map($mapper)->implode('');
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Results array of items from Collection or Arrayable.
     *
     * @param  mixed  $items
     *
     * @return array
     */
    protected function getArrayableItems($items)
    {
        if ($items instanceof HtmlElement || $items instanceof HtmlString)
            return [$items];

        return parent::getArrayableItems($items);
    }

    /**
     * Check if valid child.
     *
     * @param  mixed  $child
     *
     * @return bool
     */
    protected static function isValidChild($child)
    {
        return $child instanceof HtmlElement
            || $child instanceof HtmlString
            || is_string($child)
            || is_null($child);
    }
}
