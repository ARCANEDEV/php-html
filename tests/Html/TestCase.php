<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use Arcanedev\Html\Html;
use Arcanedev\Html\Tests\TestCase as BaseTestCase;

/**
 * Class     TestCase
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class TestCase extends BaseTestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  \Arcanedev\Html\Html */
    protected $html;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    public function setUp(): void
    {
        parent::setUp();

        $this->html = new Html;
    }

    protected function tearDown(): void
    {
        unset($this->html);

        parent::tearDown();
    }
}
