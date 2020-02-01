<?php

declare(strict_types=1);

namespace Arcanedev\Html\Contracts;

use Illuminate\Contracts\Support\Htmlable;

/**
 * Interface     Renderable
 *
 * @package  Arcanedev\Html\Contracts
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface Renderable extends Htmlable
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Render the object as a string of HTML.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function render();
}
