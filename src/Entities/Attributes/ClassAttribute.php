<?php

declare(strict_types=1);

namespace Arcanedev\Html\Entities\Attributes;

use Countable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\{Arr, Collection};

/**
 * Class     ClassAttribute
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ClassAttribute extends AbstractAttribute implements Countable
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string */
    protected $name = 'class';

    protected $classes = [];

    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */

    /**
     * ClassAttribute constructor.
     *
     * @param  mixed|null $value
     */
    public function __construct($value = null)
    {
        $this->setValue($value);
    }

    /**
     * @param  mixed|null $value
     *
     * @return \Arcanedev\Html\Entities\Attributes\ClassAttribute
     */
    public static function make($value = null)
    {
        return new static($value);
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
        return implode(' ', $this->all());
    }

    /**
     * Get the attribute's value.
     *
     * @param  mixed $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        if ( ! is_null($value))
            $this->classes = static::parseClasses($value);

        return $this;
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get all the classes.
     *
     * @return array
     */
    public function all()
    {
        return $this->classes;
    }

    /**
     * Push the given class.
     *
     * @param  string  $class
     *
     * @return $this
     */
    public function push(string $class)
    {
        foreach (explode(' ', $class) as $item) {
            if ( ! $this->has($item))
                $this->classes[] = $item;
        }

        return $this;
    }

    /**
     * Remove the given class.
     *
     * @param  string  $class
     *
     * @return $this
     */
    public function remove($class)
    {
        if ( ! $this->has($class))
            return $this;

        $class = trim($class);

        return $this->setValue(
            array_diff($this->all(), [$class])
        );
    }

    /**
     * Toggle the given class.
     *
     * @param  string  $class
     *
     * @return $this
     */
    public function toggle(string $class)
    {
        return $this->has($class)
            ? $this->remove($class)
            : $this->push($class);
    }

    /**
     * Check if contains the given class (alias).
     *
     * @see  has
     *
     * @param  string  $class
     *
     * @return bool
     */
    public function contains(string $class)
    {
        return $this->has($class);
    }

    /**
     * Check if contains the given class.
     *
     * @param  string  $class
     *
     * @return bool
     */
    public function has(string $class)
    {
        return in_array(trim($class), $this->all());
    }

    /**
     * Replaces an existing class with a new class.
     *
     * @param  string  $oldClass
     * @param  string  $newClass
     *
     * @return $this
     */
    public function replace($oldClass, $newClass)
    {
        if ($this->has($oldClass))
            $this->remove($oldClass)->push($newClass);

        return $this;
    }

    /**
     * Count the classes.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->all());
    }

    /**
     * Check if is empty.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->all());
    }

    /**
     * Check if is not empty.
     *
     * @return bool
     */
    public function isNotEmpty()
    {
        return ! $this->isEmpty();
    }

    /**
     * Render the attribute.
     *
     * @return string
     */
    public function render()
    {
        if ($this->isEmpty())
            return '';

        return $this->name.'="'.e($this->value(), false).'"';
    }

    /**
     * Render the attribute.
     *
     * @see render
     *
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Parse the given value.
     *
     * @param  mixed  $classes
     *
     * @return array
     */
    private static function parseClasses($classes)
    {
        if ($classes instanceof Arrayable || $classes instanceof Collection)
            $classes = $classes->toArray();

        if (is_string($classes))
            $classes = explode(' ', $classes);

        if (Arr::isAssoc($classes))
            $classes = Collection::make($classes)
                ->transform(function ($value, $key) {
                    return is_numeric($key) ? $value : ($value ? $key : false);
                })
                ->filter()
                ->values()
                ->toArray();

        return array_unique($classes);
    }
}
