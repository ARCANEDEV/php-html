<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements\Concerns;

use Arcanedev\Html\Elements\HtmlElement;
use Arcanedev\Html\Entities\ChildrenCollection;
use Closure;

/**
 * Trait     HasChildElements
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
trait HasChildElements
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * @var \Arcanedev\Html\Entities\ChildrenCollection
     */
    protected $children;

    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */

    /**
     * Get the children elements.
     *
     * @return \Arcanedev\Html\Entities\ChildrenCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set the children elements.
     *
     * @param \Arcanedev\Html\Entities\ChildrenCollection $children
     *
     * @return $this
     */
    public function setChildren(ChildrenCollection $children)
    {
        $this->children = $children;

        return $this;
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Init the children elements.
     *
     * @return $this
     */
    public function initChildren()
    {
        return $this->setChildren(
            new ChildrenCollection
        );
    }

    /**
     * Alias for `addChild`.
     *
     * @param  mixed          $children
     * @param  \Closure|null  $mapper
     *
     * @return $this
     */
    public function children($children, Closure $mapper = null)
    {
        return $this->addChild($children, $mapper);
    }

    /**
     * Add a child element to the parent.
     *
     * @param  mixed          $child
     * @param  \Closure|null  $mapper
     *
     * @return $this
     */
    public function addChild($child, Closure $mapper = null)
    {
        if (is_null($child))
            return $this;

        return tap(clone $this, function (HtmlElement $elt) use ($child, $mapper) {
            $elt->setChildren(
                $elt->getChildren()->merge(ChildrenCollection::parse($child, $mapper))
            );
        });
    }

    /**
     * Replace all children with an array of elements.
     *
     * @param  mixed          $children
     * @param  \Closure|null  $mapper
     *
     * @return $this
     */
    public function setNewChildren($children, Closure $mapper = null)
    {
        return tap(clone $this)
            ->initChildren()
            ->addChild($children, $mapper);
    }

    /**
     * Alias for `prependChildren`.
     *
     * @param  \Arcanedev\Html\Elements\HtmlElement|string|iterable  $children
     * @param  \Closure|null                                         $mapper
     *
     * @return $this
     */
    public function prependChild($children, $mapper = null)
    {
        return $this->prependChildren($children, $mapper);
    }

    /**
     * Prepend children elements.
     *
     * @param  mixed          $children
     * @param  \Closure|null  $mapper
     *
     * @return $this
     */
    public function prependChildren($children, Closure $mapper = null)
    {
        return tap(clone $this, function (HtmlElement $elt) use ($children, $mapper) {
            $elt->getChildren()
                ->prepend(ChildrenCollection::parse($children, $mapper));
        });
    }
}
