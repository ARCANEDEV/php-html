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

    protected $tag = 'img';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Set the src attribute.
     *
     * @param  string|null  $src
     *
     * @return static
     */
    public function src($src)
    {
        return $this->attribute('src', $src);
    }

    /**
     * Set the alt attribute.
     *
     * @param  string|null  $alt
     *
     * @return static
     */
    public function alt($alt)
    {
        return $this->attribute('alt', $alt);
    }
}
