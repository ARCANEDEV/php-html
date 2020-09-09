<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

use Arcanedev\Html\Elements\Concerns\HasAutofocusAttribute;
use Arcanedev\Html\Elements\Concerns\HasDisabledAttribute;
use Arcanedev\Html\Elements\Concerns\HasMinMaxLengthAttributes;
use Arcanedev\Html\Elements\Concerns\HasNameAttribute;
use Arcanedev\Html\Elements\Concerns\HasPlaceholderAttribute;
use Arcanedev\Html\Elements\Concerns\HasReadonlyAttribute;
use Arcanedev\Html\Elements\Concerns\HasRequiredAttribute;
use Arcanedev\Html\Elements\Concerns\HasValueAttribute;

/**
 * Class     Textarea
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Textarea extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use HasAutofocusAttribute,
        HasDisabledAttribute,
        HasMinMaxLengthAttributes,
        HasNameAttribute,
        HasPlaceholderAttribute,
        HasReadonlyAttribute,
        HasRequiredAttribute;

    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    protected $tag = 'textarea';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Set the textarea value.
     *
     * @param string|null $value
     *
     * @return $this
     */
    public function value($value)
    {
        return $this->html($value);
    }

    /**
     * Set the textarea cols & rows sizes.
     *
     * @param  string  $size
     *
     * @return $this
     */
    public function size(string $size)
    {
        list($cols, $rows) = explode('x', $size);

        return $this->attribute('cols', $cols)->attribute('rows', $rows);
    }
}
