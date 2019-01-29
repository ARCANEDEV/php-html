<?php namespace Arcanedev\Html\Exceptions;

/**
 * Class     InvalidHtml
 *
 * @package  Arcanedev\Html\Exceptions
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class InvalidHtmlException extends \Exception
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    public static function onTag(string $tag)
    {
        return new static(
            "Can't set inner contents on `{$tag}` because it's a void element"
        );
    }
}
