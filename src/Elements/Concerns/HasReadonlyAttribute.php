<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements\Concerns;

/**
 * Trait     HasReadonlyAttribute
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @mixin \Arcanedev\Html\Elements\Concerns\HasAttributes
 */
trait HasReadonlyAttribute
{
    /**
     * Add the readonly attribute.
     *
     * @param  bool  $readonly
     *
     * @return $this
     */
    public function readonly(bool $readonly = true)
    {
        return $readonly
            ? $this->attribute('readonly')
            : $this->forgetAttribute('readonly');
    }
}
