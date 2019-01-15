<?php namespace Arcanedev\Html\Elements;

/**
 * Class     Input
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Input extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    protected $tag = 'input';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Set the autofocus attribute.
     *
     * @return static
     */
    public function autofocus()
    {
        return $this->attribute('autofocus');
    }

    /**
     * @param  bool  $checked
     *
     * @return static
     */
    public function checked($checked = true)
    {
        return $checked
            ? $this->attribute('checked', 'checked')
            : $this->forgetAttribute('checked');
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

    /**
     * @param  string|null  $name
     *
     * @return static
     */
    public function name($name)
    {
        return $this->attribute('name', $name);
    }

    /**
     * @param string|null $placeholder
     *
     * @return static
     */
    public function placeholder($placeholder)
    {
        return $this->attribute('placeholder', $placeholder);
    }

    /**
     * @param bool $required
     *
     * @return static
     */
    public function required($required = true)
    {
        return $required
            ? $this->attribute('required')
            : $this->forgetAttribute('required');
    }

    /**
     * @param string|null $type
     *
     * @return static
     */
    public function type($type)
    {
        return $this->attribute('type', $type);
    }

    /**
     * @return static
     */
    public function unchecked()
    {
        return $this->checked(false);
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
     * @return static
     */
    public function readonly()
    {
        return $this->attribute('readonly');
    }
}
