<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements\Concerns;

/**
 * Trait     HasRequiredAttribute
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @mixin \Arcanedev\Html\Elements\Concerns\HasAttributes
 */
trait HasRequiredAttribute
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Add the required attribute.
     *
     * @param  bool  $required
     *
     * @return $this
     */
    public function required($required = true)
    {
        return $required
            ? $this->attribute('required')
            : $this->forgetAttribute('required');
    }
}
