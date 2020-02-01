<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

/**
 * Class     Button
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Button extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string */
    protected $tag = 'button';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Set the type attribute.
     *
     * @param  string  $type
     *
     * @return static
     */
    public function type($type)
    {
        return $this->attributeIf(in_array($type, ['button', 'submit', 'reset']), 'type', $type);
    }

    /**
     * Set as submit button.
     *
     * @return \Arcanedev\Html\Elements\Button
     */
    public function submit()
    {
        return $this->type('submit');
    }

    /**
     * Set as reset button.
     *
     * @return \Arcanedev\Html\Elements\Button
     */
    public function reset()
    {
        return $this->type('reset');
    }

    /**
     * Set the value attribute.
     *
     * @param  string  $value
     *
     * @return static
     */
    public function value($value)
    {
        return $this->attribute('value', $value);
    }
}
