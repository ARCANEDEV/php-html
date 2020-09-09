<?php

declare(strict_types=1);

namespace Arcanedev\Html\Contracts\Elements;

use Arcanedev\Html\Contracts\Renderable;

/**
 * Interface  HtmlElement
 *
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
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
     * @param  string       $name
     * @param  string|null  $value
     *
     * @return static
     */
    public function attribute(string $name, $value = null);

    /**
     * Set the attributes.
     *
     * @param  iterable  $attributes
     *
     * @return static
     */
    public function attributes($attributes);
}
