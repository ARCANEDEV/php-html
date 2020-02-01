<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests;

use Arcanedev\Html\Tests\Concerns\AssertsHtmlStrings;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Class     TestCase
 *
 * @package  Arcanedev\Html\Tests
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class TestCase extends BaseTestCase
{
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use AssertsHtmlStrings;
}
