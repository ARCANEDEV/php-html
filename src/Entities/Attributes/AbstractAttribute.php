<?php

declare(strict_types=1);

namespace Arcanedev\Html\Entities\Attributes;

/**
 * Class     AbstractAttribute
 *
 * @package  Arcanedev\Html\Entities\Attributes
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class AbstractAttribute
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string */
    protected $name;

    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */

    /**
     * Get the attribute name.
     *
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * Get the attribute's value.
     *
     * @return string
     */
    abstract public function value();

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Render the attribute.
     *
     * @return string
     */
    abstract public function render();
}
