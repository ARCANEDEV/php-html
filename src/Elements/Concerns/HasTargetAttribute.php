<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements\Concerns;

/**
 * Trait     HasTargetAttribute
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
trait HasTargetAttribute
{
    /**
     * @param string $target
     *
     * @return static
     */
    public function target($target)
    {
        return $this->attribute('target', $target);
    }
}
