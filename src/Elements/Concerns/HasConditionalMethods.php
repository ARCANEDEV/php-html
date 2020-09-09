<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements\Concerns;

use Closure;

/**
 * Trait     HasConditionalMethods
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
trait HasConditionalMethods
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * The supported conditions.
     *
     * @var array
     */
    protected $supportedConditions = [
        'If',
        'Unless',
        'IfNotNull',
    ];

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Conditionally transform the element.
     * Note that since elements are immutable, you'll need to return a new instance from the callback.
     *
     * @param  bool      $condition
     * @param  \Closure  $callback
     *
     * @return $this|mixed
     */
    public function if(bool $condition, Closure $callback)
    {
        return $condition ? $callback($this) : $this;
    }

    /**
     * Conditionally transform the element.
     * Note that since elements are immutable, you'll need to return a new instance from the callback.
     *
     * @param  bool      $condition
     * @param  \Closure  $callback
     *
     * @return $this|mixed
     */
    public function unless(bool $condition, Closure $callback)
    {
        return $this->if( ! $condition, $callback);
    }

    /**
     * Conditionally transform the element.
     * Note that since elements are immutable, you'll need to return a new instance from the callback.
     *
     * @param  mixed     $value
     * @param  \Closure  $callback
     *
     * @return mixed
     */
    public function ifNotNull($value, Closure $callback)
    {
        return $this->if( ! is_null($value), $callback);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Call the if condition.
     *
     * @param  string  $conditions
     * @param  string  $method
     * @param  array   $arguments
     *
     * @return \Arcanedev\Html\Elements\HtmlElement|mixed
     */
    protected function callConditionalMethod(string $conditions, string $method, array $arguments)
    {
        $value    = array_shift($arguments);
        $callback = function () use ($method, $arguments): self {
            return $this->{$method}(...$arguments);
        };

        switch ($conditions) {
            case 'If':
                return $this->if((bool) $value, $callback);

            case 'Unless':
                return $this->unless((bool) $value, $callback);

            case 'IfNotNull':
                return $this->ifNotNull($value, $callback);
            default:
                return $this;
        }
    }
}
