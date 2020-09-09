<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

/**
 * Class     A
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class A extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    protected $tag = 'a';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Set the href url.
     *
     * @param  string  $href
     *
     * @return static
     */
    public function href($href)
    {
        return $this->attribute('href', $href);
    }
}
