<?php namespace Arcanedev\Html\Elements;

/**
 * Class     Optgroup
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Optgroup extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    protected $tag = 'optgroup';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * @param  string  $label
     *
     * @return static
     */
    public function label($label)
    {
        return $this->attribute('label', $label);
    }
}
