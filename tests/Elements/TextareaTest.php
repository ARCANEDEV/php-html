<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Textarea;
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
    public function it_can_create(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea></textarea>',
            Textarea::make()
        );
    }

    #[Test]
    public function it_can_create_with_autofocus_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea autofocus></textarea>',
            Textarea::make()->autofocus()
        );
    }

    #[Test]
    public function it_can_create_with_a_placeholder(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea placeholder="Lorem ipsum"></textarea>',
            Textarea::make()->placeholder('Lorem ipsum')
        );
    }

    #[Test]
    public function it_can_create_with_a_name(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea name="text"></textarea>',
            Textarea::make()->name('text')
        );
    }

    #[Test]
    public function it_can_create_with_a_value(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea>My epic content</textarea>',
            Textarea::make()->value('My epic content')
        );
    }

    #[Test]
    public function it_can_create_with_required_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea required>My epic content</textarea>',
            Textarea::make()->value('My epic content')->required()
        );
    }

    #[Test]
    public function it_can_set_the_size(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea cols="60" rows="15">My epic content</textarea>',
            Textarea::make()->value('My epic content')->size('60x15')
        );
    }
}
