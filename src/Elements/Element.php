<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

/**
 * Class     Element
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Element extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Create a element with
     *
     * @param  string  $tag
     *
     * @return $this
     */
    public static function withTag($tag)
    {
        return static::make()->setTag($tag);
    }

    /**
     * @param  string  $tag
     *
     * @return $this
     */
    protected function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }
}
