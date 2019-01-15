<?php namespace Arcanedev\Html\Entities;

use Arcanedev\Html\Contracts\Renderable;
use Arcanedev\Html\Exceptions\InvalidChild;
use Arcanedev\Html\Elements\HtmlElement;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

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
        if ($children instanceof HtmlElement || $children instanceof HtmlString)
            $children = [$children];

        return static::make($children)
            ->unless(is_null($mapper), function (ChildrenCollection $items) use ($mapper) {
                return $items->map($mapper);
            })
            ->each(function ($child) {
                if ( ! static::isValidChild($child))
                    throw InvalidChild::childMustBeAnHtmlElementOrAString();
            });
    }

    /**
     * Render the object as a string of HTML.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function render()
    {
        $html = $this->map(function ($child): string {
            if ($child instanceof Renderable)
                return $child->render();

            if (is_null($child))
                return '';

            if (is_string($child) || $child instanceof HtmlString)
                return $child;

            throw InvalidChild::childMustBeAnHtmlElementOrAString();
        })->implode('');

        return new HtmlString($html);
    }

    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        return $this->render()->toHtml();
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

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
