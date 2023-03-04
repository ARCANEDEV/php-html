<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests;

use Arcanedev\Html\Html;

/**
 * Class     HtmlTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class HtmlTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    private Html $html;

    /* -----------------------------------------------------------------
     |  Main Tests
     | -----------------------------------------------------------------
     */

    protected function setUp(): void
    {
        parent::setUp();

        $this->html = new Html;
    }

    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_make_class_attribute(): void
    {
        static::assertSame(
            'class="btn btn-sm btn-primary"',
            $this->html->class('btn btn-sm btn-primary')
        );
    }
}
