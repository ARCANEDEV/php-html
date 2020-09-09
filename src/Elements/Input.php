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
use Arcanedev\Html\Elements\Concerns\HasTypeAttribute;
use Arcanedev\Html\Elements\Concerns\HasValueAttribute;

/**
 * Class     Input
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Input extends HtmlElement
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
        HasRequiredAttribute,
        HasTypeAttribute,
        HasValueAttribute;

    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string */
    protected $tag = 'input';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Add the checked attribute.
     *
     * @param  bool  $checked
     *
     * @return $this
     */
    public function checked($checked = true)
    {
        $type = $this->getAttributeValue('type');

        return $this->if($type === 'checkbox', function (self $input) use ($checked) {
            return $checked
                ? $input->attribute('checked')
                : $input->forgetAttribute('checked');
        });
    }

    /**
     * Remove the checked attribute.
     *
     * @return $this
     */
    public function unchecked()
    {
        return $this->checked(false);
    }
}
