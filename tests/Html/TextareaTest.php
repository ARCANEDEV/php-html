<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

/**
 * Class     TextareaTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class TextareaTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_textarea(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea></textarea>',
            $this->html->textarea()
        );
    }

    /** @test */
    public function it_can_create_a_textarea_with_a_name(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea id="description" name="description"></textarea>',
            $this->html->textarea('description')
        );
    }

    /** @test */
    public function it_can_create_a_textarea_with_a_value(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea id="description" name="description">Foo bar</textarea>',
            $this->html->textarea('description', 'Foo bar')
        );
    }
}
