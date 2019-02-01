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

    /** @var  string */
    protected $tag = 'optgroup';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Set the label attribute.
     *
     * @param  string  $label
     *
     * @return $this
     */
    public function label($label)
    {
        return $this->attribute('label', $label);
    }
}
