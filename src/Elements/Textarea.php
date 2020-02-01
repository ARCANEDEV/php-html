<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

/**
 * Class     Textarea
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Textarea extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    protected $tag = 'textarea';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Add the autofocus attribute.
     *
     * @return $this
     */
    public function autofocus()
    {
        return $this->attribute('autofocus');
    }

    /**
     * Add the placeholder attribute.
     *
     * @param  string  $placeholder
     *
     * @return $this
     */
    public function placeholder($placeholder)
    {
        return $this->attribute('placeholder', $placeholder);
    }

    /**
     * Add the name attribute.
     *
     * @param  string  $name
     *
     * @return $this
     */
    public function name($name)
    {
        return $this->attribute('name', $name);
    }

    /**
     * Add the required attribute.
     *
     * @return $this
     */
    public function required()
    {
        return $this->attribute('required');
    }

    /**
     * @param  string  $value
     *
     * @return $this
     */
    public function value($value)
    {
        return $this->html($value);
    }

    /**
     * @param  string  $size
     *
     * @return $this
     */
    public function size($size)
    {
        list($cols, $rows) = explode('x', $size);

        return $this->attribute('cols', $cols)->attribute('rows', $rows);
    }
}
