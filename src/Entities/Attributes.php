<?php

declare(strict_types=1);

namespace Arcanedev\Html\Entities;

use Arcanedev\Html\Entities\Attributes\{AbstractAttribute, ClassAttribute, MiscAttribute};
use ArrayAccess;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Class     Attributes
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Attributes implements ArrayAccess, Arrayable
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  array */
    protected $items;

    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */

    /**
     * Attributes constructor.
     *
     * @param  array  $items
     */
    public function __construct(array $items = [])
    {
        $this->items = [];
        $this->setMany($items);
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Make the attribute instance.
     *
     * @param  array  $items
     *
     * @return \Arcanedev\Html\Entities\Attributes
     */
    public static function make(array $items = [])
    {
        return new static($items);
    }

    /**
     * Set an attribute.
     *
     * @param  string      $name
     * @param  mixed|null  $value
     *
     * @return static
     */
    public function set($name, $value = null)
    {
        $attribute = static::makeAttribute($name, $value);

        $this->offsetSet($attribute->name(), $attribute);

        return $this;
    }

    /**
     * Make a new attribute.
     *
     * @param  string  $name
     * @param  mixed   $value
     *
     * @return mixed
     */
    protected static function makeAttribute(string $name, $value)
    {
        switch ($name) {
            case 'class':
                return new ClassAttribute($value);

            default:
                return new MiscAttribute($name, $value);
        }
    }

    /**
     * Get an attribute.
     *
     * @param  string  $key
     * @param  mixed   $default
     *
     * @return \Arcanedev\Html\Entities\Attributes\AbstractAttribute|mixed
     */
    public function get($key, $default = null)
    {
        return $this->offsetExists($key)
            ? $this->offsetGet($key)
            : value($default);
    }

    /**
     * @param  string|array  $keys
     *
     * @return static
     */
    public function forget($keys)
    {
        foreach ((array) $keys as $key) {
            $this->offsetUnset($key);
        }

        return $this;
    }

    /**
     * Determine if an item exists in the collection by key.
     *
     * @param  mixed  $keys
     *
     * @return bool
     */
    public function has(...$keys)
    {
        foreach ($keys as $value) {
            if ( ! $this->offsetExists($value))
                return false;
        }

        return true;
    }

    /**
     * Set many attributes.
     *
     * @param  iterable  $attributes
     *
     * @return static
     */
    public function setMany($attributes)
    {
        foreach ($attributes as $attribute => $value) {
            if (is_int($attribute)) {
                $attribute = $value;
                $value     = null;
            }

            $this->set($attribute, $value);
        }

        return $this;
    }

    /**
     * Add a class.
     *
     * @param  iterable|string  $class
     *
     * @return static
     */
    public function addClass($class)
    {
        return $this->set('class', $class);
    }

    /**
     * Render the attributes.
     *
     * @return string
     */
    public function render()
    {
        if ($this->isNotEmpty())
            return implode(' ', array_map(function (AbstractAttribute $attribute) {
                return $attribute->render();
            }, $this->items));

        return '';
    }

    /**
     * Convert the attributes to array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_map(function (AbstractAttribute $attribute) {
            return $attribute->value();
        }, $this->items);
    }

    /**
     * Check if the container is empty.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->items);
    }

    /**
     * Check if the container is not empty.
     *
     * @return bool
     */
    public function isNotEmpty()
    {
        return ! $this->isEmpty();
    }

    /**
     * Get the class attribute.
     *
     * @return \Arcanedev\Html\Entities\Attributes\ClassAttribute|null
     */
    public function classList()
    {
        return $this->get('class');
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Determine if an item exists at an offset.
     *
     * @param  mixed  $key
     *
     * @return bool
     */
    public function offsetExists($key)
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * Get an item at a given offset.
     *
     * @param  mixed  $key
     *
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->items[$key];
    }

    /**
     * Set the item at a given offset.
     *
     * @param  mixed  $key
     * @param  mixed  $value
     *
     * @return void
     */
    public function offsetSet($key, $value)
    {
        $this->items[$key] = $value;
    }

    /**
     * Unset the item at a given offset.
     *
     * @param  string  $key
     *
     * @return void
     */
    public function offsetUnset($key)
    {
        unset($this->items[$key]);
    }
}
