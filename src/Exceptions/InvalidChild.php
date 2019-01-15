<?php namespace Arcanedev\Html\Exceptions;

/**
 * Class     InvalidChild
 *
 * @package  Arcanedev\Html\Exceptions
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class InvalidChild extends \Exception
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    public static function childMustBeAnHtmlElementOrAString()
    {
        return new static;
    }
}
