<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

/**
 * Class     LabelTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LabelTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_label(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label></label>',
            $this->html->label()
        );
    }

    /** @test */
    public function it_can_create_a_label_with_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label>Hi</label>',
            $this->html->label('Hi')
        );
    }

    /** @test */
    public function it_can_create_a_label_with_html_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label><em>Hi</em></label>',
            $this->html->label('<em>Hi</em>')
        );
    }

    /** @test */
    public function it_can_create_a_label_with_a_custom_for_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label for="some_input_id">Hi</label>',
            $this->html->label('Hi', 'some_input_id')
        );
    }
}
