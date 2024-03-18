<?php

declare(strict_types=1);

namespace Arcanedev\Html\Entities\Attributes;

/**
 * Class     AbstractAttribute
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class AbstractAttribute
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    protected string $name;

    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */

    /**
     * Get the attribute name.
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Get the attribute's value.
     *
     * @return mixed
     */
    abstract public function value(): mixed;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Render the attribute.
     */
    abstract public function render(): string;
}
