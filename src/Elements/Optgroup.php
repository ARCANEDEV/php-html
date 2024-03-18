<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

/**
 * Class     Optgroup
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Optgroup extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    protected string $tag = 'optgroup';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Set the label attribute.
     *
     * @return $this
     */
    public function label(string $label): static
    {
        return $this->attribute('label', $label);
    }
}
