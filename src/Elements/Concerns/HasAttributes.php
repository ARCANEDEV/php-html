<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements\Concerns;

use Arcanedev\Html\Elements\HtmlElement;
use Arcanedev\Html\Entities\Attributes;

/**
 * Trait     HasAttributes
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
trait HasAttributes
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * The element's attributes.
     *
     * @var \Arcanedev\Html\Entities\Attributes
     */
    protected $attributes;

    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */

    /**
     * Get the element attributes.
     *
     * @return \Arcanedev\Html\Entities\Attributes
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Reset the attributes.
     *
     * @return $this
     */
    public function initAttributes()
    {
        $this->attributes = new Attributes;

        return $this;
    }

    /**
     * Set an attribute.
     *
     * @param  string       $name
     * @param  string|null  $value
     *
     * @return $this
     */
    public function attribute(string $name, $value = null)
    {
        return tap(clone $this, function (HtmlElement $elt) use ($name, $value) {
            $elt->getAttributes()->set($name, $value);
        });
    }

    /**
     * Set the attributes.
     *
     * @param  iterable  $attributes
     *
     * @return $this
     */
    public function attributes($attributes)
    {
        return tap(clone $this, function (HtmlElement $elt) use ($attributes) {
            $elt->getAttributes()->setMany($attributes);
        });
    }

    /**
     * Forget attribute.
     *
     * @param  string  $name
     *
     * @return $this
     */
    public function forgetAttribute(string $name)
    {
        if ( ! $this->hasAttribute($name))
            return $this;

        return tap(clone $this, function ($elt) use ($name) {
            /** @var  static  $elt */
            $elt->getAttributes()->forget($name);
        });
    }

    /**
     * Get an attribute.
     *
     * @param  string  $name
     * @param  mixed   $default
     *
     * @return \Arcanedev\Html\Entities\Attributes\MiscAttribute|mixed
     */
    public function getAttribute(string $name, $default = null)
    {
        return $this->getAttributes()->get($name, $default);
    }

    /**
     * Get the attribute's value.
     *
     * @param  string  $name
     *
     * @return string|mixed
     */
    protected function getAttributeValue(string $name)
    {
        return $this->hasAttribute($name)
            ? $this->getAttribute($name)->value()
            : null;
    }

    /**
     * Check if attribute exists.
     *
     * @param  string  $attribute
     *
     * @return bool
     */
    public function hasAttribute(string $attribute)
    {
        return $this->getAttributes()->has($attribute);
    }
}
