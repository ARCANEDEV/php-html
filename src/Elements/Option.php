<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

use Arcanedev\Html\Contracts\Selectable;

/**
 * Class     Option
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @method   \Arcanedev\Html\Elements\Option  selectedUnless(bool $condition)
 */
class Option extends HtmlElement implements Selectable
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string */
    protected $tag = 'option';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Add the selected if it fulfill the condition.
     *
     * @param  bool  $condition
     *
     * @return $this
     */
    public function selectedIf($condition)
    {
        return $condition ? $this->selected() : $this->unselected();
    }

    /**
     * Add the selected attribute.
     *
     * @return $this
     */
    public function selected()
    {
        return $this->attribute('selected');
    }

    /**
     * Remove the selected attribute.
     *
     * @return $this
     */
    public function unselected()
    {
        return $this->forgetAttribute('selected');
    }

    /**
     * Set the value.
     *
     * @param  string  $value
     *
     * @return $this
     */
    public function value($value)
    {
        return $this->attribute('value', $value);
    }

    /**
     * Set the disabled attribute.
     *
     * @param  bool  $disabled
     *
     * @return $this
     */
    public function disabled($disabled = true)
    {
        return $disabled
            ? $this->attribute('disabled')
            : $this->forgetAttribute('disabled');
    }
}
