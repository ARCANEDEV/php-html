<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements\Concerns;

/**
 * Trait     HasAutofocusAttribute
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @mixin \Arcanedev\Html\Elements\Concerns\HasAttributes
 */
trait HasAutofocusAttribute
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Add the autofocus attribute.
     *
     * @param  bool  $autofocus
     *
     * @return $this
     */
    public function autofocus($autofocus = true)
    {
        return $autofocus
            ? $this->attribute('autofocus')
            : $this->forgetAttribute('autofocus');
    }

}
