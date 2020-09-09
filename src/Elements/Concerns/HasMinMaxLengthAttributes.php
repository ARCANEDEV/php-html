<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements\Concerns;

/**
 * Trait     HasMinMaxLengthAttributes
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @mixin \Arcanedev\Html\Elements\Concerns\HasAttributes
 */
trait HasMinMaxLengthAttributes
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Add the `minlength` attribute.
     *
     * @param  int  $length
     *
     * @return $this
     */
    public function minlength(int $length)
    {
        return $this->attribute('minlength', $length);
    }

    /**
     * Add the `maxlength` attribute.
     *
     * @param  int  $length
     *
     * @return $this
     */
    public function maxlength(int $length)
    {
        return $this->attribute('maxlength', $length);
    }
}
