<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

/**
 * Class     ResetTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ResetTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_reset_button(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button type="reset"></button>',
            $this->html->reset()
        );
    }

    /** @test */
    public function it_can_create_a_reset_button_with_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button type="reset">Reset</button>',
            $this->html->reset('Reset')
        );
    }
}
