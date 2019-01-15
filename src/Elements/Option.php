<?php namespace Arcanedev\Html\Elements;

use Arcanedev\Html\Contracts\Selectable;

/**
 * Class     Option
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Option extends HtmlElement implements Selectable
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var string */
    protected $tag = 'option';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * @param  bool  $condition
     *
     * @return static
     */
    public function selectedIf($condition)
    {
        return $condition ? $this->selected() : $this->unselected();
    }

    /**
     * @return static
     */
    public function selected()
    {
        return $this->attribute('selected', null);
    }

    /**
     * @return static
     */
    public function unselected()
    {
        return $this->forgetAttribute('selected');
    }

    /**
     * @param  string  $value
     *
     * @return static
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
     * @return static
     */
    public function disabled($disabled = true)
    {
        return $disabled
            ? $this->attribute('disabled', 'disabled')
            : $this->forgetAttribute('disabled');
    }
}
