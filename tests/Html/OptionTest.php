<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use PHPUnit\Framework\Attributes\Test;

/**
 * Class     OptionTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class OptionTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_create_an_empty_option(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option value=""></option>',
            $this->html->option()
        );
    }

    #[Test]
    public function it_can_create_an_option_with_text(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option value="">Hi</option>',
            $this->html->option('Hi')
        );
    }

    #[Test]
    public function it_can_create_an_option_with_text_and_a_value(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option value="1">Hi</option>',
            $this->html->option('Hi', 1)
        );
    }

    #[Test]
    public function it_can_create_a_selected_option_with_text_and_a_value(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option selected value="1">Hi</option>',
            $this->html->option('Hi', 1, true)
        );
    }
}
