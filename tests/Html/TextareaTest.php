<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use PHPUnit\Framework\Attributes\Test;

/**
 * Class     TextareaTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class TextareaTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_create_a_textarea(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea></textarea>',
            $this->html->textarea()
        );
    }

    #[Test]
    public function it_can_create_a_textarea_with_a_name(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea id="description" name="description"></textarea>',
            $this->html->textarea('description')
        );
    }

    #[Test]
    public function it_can_create_a_textarea_with_a_value(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea id="description" name="description">Foo bar</textarea>',
            $this->html->textarea('description', 'Foo bar')
        );
    }
}
