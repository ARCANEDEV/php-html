<?php namespace Arcanedev\Html\Elements;

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
        return $this->attribute('type', $type);
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
