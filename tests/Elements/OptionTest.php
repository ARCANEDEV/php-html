<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Option;
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
    public function it_can_render_an_empty_version_itself(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option></option>',
            Option::make()->render()
        );
    }

    #[Test]
    public function it_can_render_itself_with_a_text_and_a_value(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option value="0">Choose...</option>',
            Option::make()->value('0')->text('Choose...')->render()
        );
    }

    #[Test]
    public function it_can_render_itself_in_a_selected_state(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option selected value="0">Choose...</option>',
            Option::make()->value('0')->text('Choose...')->selected()
        );
    }

    #[Test]
    public function it_can_unselect_itself(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option value="0">Choose...</option>',
            Option::make()->value('0')->text('Choose...')->selected()->unselected()
        );
    }

    #[Test]
    public function it_can_conditionally_select_itself(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option selected value="0">Choose...</option>',
            Option::make()->value('0')->text('Choose...')->selectedIf(true)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<option value="0">Choose...</option>',
            Option::make()->value('0')->text('Choose...')->selectedIf(false)
        );
    }
}
