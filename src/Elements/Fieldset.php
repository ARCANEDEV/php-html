<?php namespace Arcanedev\Html\Elements;

/**
 * Class     Fieldset
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Fieldset extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    protected $tag = 'fieldset';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Set the legend.
     *
     * @param  \Arcanedev\Html\Elements\HtmlElement|string  $content
     *
     * @return static
     */
    public function legend($content)
    {
        return $this->prependChild(
            Legend::make()->text($content)
        );
    }
}
