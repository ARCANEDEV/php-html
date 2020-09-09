<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements\Concerns;

/**
 * Trait     HasPlaceholderAttribute
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @mixin \Arcanedev\Html\Elements\Concerns\HasAttributes
 */
trait HasPlaceholderAttribute
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Add the placeholder attribute.
     *
     * @param  string  $placeholder
     *
     * @return $this
     */
    public function placeholder(string $placeholder)
    {
        return $this->attribute('placeholder', $placeholder);
    }
}
