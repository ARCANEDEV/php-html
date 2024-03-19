<?php

declare(strict_types=1);

namespace Arcanedev\Html\Entities;

use Arcanedev\Html\Contracts\Renderable;
use Arcanedev\Html\Elements\HtmlElement;
use Arcanedev\Html\Exceptions\InvalidChildException;
use Closure;
use Illuminate\Support\{Collection, HtmlString};
use Illuminate\Contracts\Support\Htmlable;

/**
 * Class     ChildrenCollection
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ChildrenCollection extends Collection implements Renderable
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Parse the element's children.
     *
     * @return $this
     *
     * @throws \Arcanedev\Html\Exceptions\InvalidChildException
     */
    public static function parse(mixed $children, ?Closure $mapper = null): static
    {
        return static::make($children)
            ->unless(is_null($mapper), fn(ChildrenCollection $items) => $items->map($mapper))
            ->each(function ($child) {
                if (! static::isValidChild($child))
                    throw new InvalidChildException;
            });
    }

    /**
     * Render the object as a string of HTML.
     */
    public function render(): HtmlString
    {
        return new HtmlString($this->toHtml());
    }

    /**
     * Get content as a string of HTML.
     */
    public function toHtml(): string
    {
        $mapper = function ($child): string {
            if (is_null($child))
                return '';

            if ($child instanceof Htmlable)
                return $child->toHtml();

            if (is_string($child) || is_numeric($child))
                return strval($child);

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
     */
    protected function getArrayableItems(mixed $items): array
    {
        if ($items instanceof HtmlElement || $items instanceof HtmlString)
            return [$items];

        return parent::getArrayableItems($items);
    }

    /**
     * Check if valid child.
     */
    protected static function isValidChild(mixed $child): bool
    {
        return $child instanceof Htmlable
            || is_string($child)
            || is_numeric($child)
            || is_null($child);
    }
}
