<?php namespace Arcanedev\Html\Elements;

/**
 * Class     Link
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @link  https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link
 */
class Link extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string */
    protected $tag = 'link';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Set the href url.
     *
     * @param  string  $href
     *
     * @return $this
     */
    public function href($href)
    {
        return $this->attribute('href', $href);
    }

    /**
     * Set the rel value.
     * @link  https://developer.mozilla.org/en-US/docs/Web/HTML/Link_types
     *
     * @param  string  $value
     *
     * @return $this
     */
    public function rel($value)
    {
        return $this->attribute('rel', $value);
    }

    /**
     * Set the rel as stylesheet.
     *
     * @param  string  $href
     *
     * @return $this
     */
    public function stylesheet($href)
    {
        return $this->rel('stylesheet')->href($href);
    }

    /**
     * Set the rel as icon.
     *
     * @param  string  $href
     *
     * @return $this
     */
    public function icon($href)
    {
        return $this->rel('icon')->href($href);
    }
}
