<?php namespace Arcanedev\Html\Elements;

/**
 * Class     Img
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Img extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string */
    protected $tag = 'img';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Set the src attribute.
     *
     * @param  string  $src
     *
     * @return $this
     */
    public function src($src)
    {
        return $this->attribute('src', $src);
    }

    /**
     * Set the alt attribute.
     *
     * @param  string  $alt
     *
     * @return $this
     */
    public function alt($alt)
    {
        return $this->attribute('alt', $alt);
    }
}
