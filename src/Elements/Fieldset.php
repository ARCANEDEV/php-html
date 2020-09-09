<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

/**
 * Class     Fieldset
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Fieldset extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string */
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
     * @return $this
     */
    public function legend($content)
    {
        return $this->prependChild(
            Legend::make()->text($content)
        );
    }
}
