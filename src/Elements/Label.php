<?php namespace Arcanedev\Html\Elements;

/**
 * Class     Label
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Label extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string */
    protected $tag = 'label';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Set the for attribute.
     *
     * @param  string  $for
     *
     * @return $this
     */
    public function for($for)
    {
        return $this->attribute('for', $for);
    }
}
