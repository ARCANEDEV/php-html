<?php namespace Arcanedev\Html\Entities\Attributes;

use Arcanedev\Html\Helpers\Arr;
use Illuminate\Support\Collection;

/**
 * Class     MiscAttribute
 *
 * @package  Arcanedev\Html\Entities\Attributes
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class MiscAttribute extends AbstractAttribute
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string|mixed */
    protected $value;

    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */

    /**
     * Attribute constructor.
     *
     * @param  string  $name
     * @param  mixed   $value
     */
    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->setValue($value);
    }

    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */

    /**
     * Get the attribute's value.
     *
     * @return string
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * Set the value.
     *
     * @param  mixed  $value
     *
     * @return static
     */
    protected function setValue($value)
    {
        $this->value = trim($value);

        return $this;
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Render the attribute.
     *
     * @return string
     */
    public function render()
    {
        $value = $this->value();

        return (is_null($value) || $value === '')
            ? $this->name
            : $this->name.'="'.e($value, false).'"';
    }
}
