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

    /** @var  string */
    protected $tag = 'input';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Set the autofocus attribute.
     *
     * @return $this
     */
    public function autofocus()
    {
        return $this->attribute('autofocus');
    }

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
            ? $this->attribute('disabled', 'disabled')
            : $this->forgetAttribute('disabled');
    }

    /**
     * Add the name attribute.
     *
     * @param  string  $name
     *
     * @return $this
     */
    public function name($name)
    {
        return $this->attribute('name', $name);
    }

    /**
     * Add the placeholder attribute.
     *
     * @param  string  $placeholder
     *
     * @return $this
     */
    public function placeholder($placeholder)
    {
        return $this->attribute('placeholder', $placeholder);
    }

    /**
     * Add the required attribute.
     *
     * @param  bool  $required
     *
     * @return $this
     */
    public function required($required = true)
    {
        return $required
            ? $this->attribute('required')
            : $this->forgetAttribute('required');
    }

    /**
     * Add the type attribute.
     *
     * @param  string  $type
     *
     * @return $this
     */
    public function type($type)
    {
        return $this->attribute('type', $type);
    }

    /**
     * Add the value attribute.
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
     * Add the readonly attribute.
     *
     * @return $this
     */
    public function readonly()
    {
        return $this->attribute('readonly');
    }
}
