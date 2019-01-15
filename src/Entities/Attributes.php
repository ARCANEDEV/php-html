<?php namespace Arcanedev\Html\Entities;

use ArrayAccess;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Class     Attributes
 *
 * @package  Arcanedev\Html\Entities
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
     * @param  string      $attribute
     * @param  mixed|null  $value
     *
     * @return static
     */
    public function set($attribute, $value = null)
    {
        $this->offsetSet($attribute, new Attribute($attribute, $value));

        return $this;
    }

    /**
     * Get an attribute.
     *
     * @param  string  $attribute
     * @param  mixed   $default
     *
     * @return \Arcanedev\Html\Entities\Attribute|mixed
     */
    public function get($attribute, $default = null)
    {
        return $this->offsetExists($attribute)
            ? $this->offsetGet($attribute)
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
                $value     = '';
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
            return implode(' ', array_map(function (Attribute $attribute) {
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
        return array_map(function (Attribute $value) {
            return $value->value();
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
