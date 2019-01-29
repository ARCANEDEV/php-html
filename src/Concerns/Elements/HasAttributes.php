<?php namespace Arcanedev\Html\Concerns\Elements;

use Arcanedev\Html\Elements\HtmlElement;
use Arcanedev\Html\Entities\Attributes;

/**
 * Trait     HasAttributes
 *
 * @package  Arcanedev\Html\Concerns\Elements
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
     * @return static
     */
    public function initAttributes()
    {
        $this->attributes = new Attributes;

        return $this;
    }

    /**
     * Set an attribute.
     *
     * @param  string       $attribute
     * @param  string|null  $value
     *
     * @return static
     */
    public function attribute($attribute, $value = null)
    {
        return tap(clone $this, function (HtmlElement $elt) use ($attribute, $value) {
            $elt->getAttributes()->set($attribute, $value);
        });
    }

    /**
     * Set the attributes.
     *
     * @param  iterable  $attributes
     *
     * @return static
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
     * @param  string  $attribute
     *
     * @return static
     */
    public function forgetAttribute($attribute)
    {
        return tap(clone $this, function (HtmlElement $elt) use ($attribute) {
            $elt->getAttributes()->forget($attribute);
        });
    }

    /**
     * Get an attribute.
     *
     * @param  string  $attribute
     * @param  mixed   $default
     *
     * @return \Arcanedev\Html\Entities\Attributes\MiscAttribute|mixed
     */
    public function getAttribute($attribute, $default = null)
    {
        return $this->getAttributes()->get($attribute, $default);
    }

    /**
     * Check if attribute exists.
     *
     * @param  string  $attribute
     *
     * @return bool
     */
    public function hasAttribute($attribute)
    {
        return $this->getAttributes()->has($attribute);
    }
}
