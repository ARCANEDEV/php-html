<?php namespace Arcanedev\Html\Contracts\Elements;

use Arcanedev\Html\Contracts\Renderable;

/**
 * Interface     HtmlElement
 *
 * @package  Arcanedev\Html\Contracts
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface HtmlElement extends Renderable
{
    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */

    /**
     * Get the element attributes.
     *
     * @return \Arcanedev\Html\Entities\Attributes
     */
    public function getAttributes();

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Set an attribute.
     *
     * @param  string       $attribute
     * @param  string|null  $value
     *
     * @return static
     */
    public function attribute($attribute, $value = null);

    /**
     * Set the attributes.
     *
     * @param  iterable  $attributes
     *
     * @return static
     */
    public function attributes($attributes);
}
