<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

/**
 * Class     EmailInputTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class EmailInputTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_make_email_input(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="email" name="email" type="email" value="hello@email.com"/>',
            $this->html->email('email', 'hello@email.com')
        );
    }
}
