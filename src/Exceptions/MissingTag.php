<?php namespace Arcanedev\Html\Exceptions;

/**
 * Class     MissingTag
 *
 * @package  Arcanedev\Html\Exceptions
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class MissingTag extends \Exception
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * @param  string  $className
     *
     * @return static
     */
    public static function onClass($className)
    {
        return new self("Class {$className} has no `\$tag` property or empty.");
    }
}
