<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements\Concerns;

/**
 * Trait     HasValueAttribute
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @mixin \Arcanedev\Html\Elements\Concerns\HasAttributes
 */
trait HasValueAttribute
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Add the value attribute.
     *
     * @param  string|mixed|null  $value
     *
     * @return $this
     */
    public function value($value)
    {
        return $this->attribute('value', $value);
    }
}
