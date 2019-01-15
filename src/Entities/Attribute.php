<?php namespace Arcanedev\Html\Entities;

use Arcanedev\Html\Helpers\Arr;
use Illuminate\Support\Collection;

/**
 * Class     Attribute
 *
 * @package  Arcanedev\Html\Entities
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Attribute
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string */
    protected $name;

    /** @var  mixed */
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
     * @return mixed
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
        if ($this->name === 'class')
            $value = $this->parseClasses($value);

        $this->value = is_string($value) ? trim($value) : $value;

        return $this;
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Make an attribute.
     *
     * @param  string  $name
     * @param  mixed   $value
     *
     * @return \Arcanedev\Html\Entities\Attribute
     */
    public static function make($name, $value)
    {
        return new static($name, $value);
    }

    /**
     * Render the attribute.
     *
     * @return string
     */
    public function render()
    {
        return (is_null($this->value) || $this->value === '')
            ? $this->name
            : $this->name.'="'.e($this->value, false).'"';
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Parse css classes.
     *
     * @param  iterable|string  $class
     *
     * @return string
     */
    private function parseClasses($class)
    {
        if (is_string($class))
            $class = explode(' ', $class);
        elseif ($class instanceof Collection)
            $class = $class->toArray();

        $class = array_unique(array_merge(
            explode(' ', $this->value ?: ''),
            Arr::getToggledValues($class)
        ));

        return implode(' ', $class);
    }
}
