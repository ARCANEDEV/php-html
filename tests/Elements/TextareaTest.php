<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Textarea;

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

    /** @test */
    public function it_can_create(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea></textarea>',
            Textarea::make()
        );
    }

    /** @test */
    public function it_can_create_with_autofocus_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea autofocus></textarea>',
            Textarea::make()->autofocus()
        );
    }

    /** @test */
    public function it_can_create_with_a_placeholder(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea placeholder="Lorem ipsum"></textarea>',
            Textarea::make()->placeholder('Lorem ipsum')
        );
    }

    /** @test */
    public function it_can_create_with_a_name(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea name="text"></textarea>',
            Textarea::make()->name('text')
        );
    }

    /** @test */
    public function it_can_create_with_a_value(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea>My epic content</textarea>',
            Textarea::make()->value('My epic content')
        );
    }

    /** @test */
    public function it_can_create_with_required_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea required>My epic content</textarea>',
            Textarea::make()->value('My epic content')->required()
        );
    }

    /** @test */
    public function it_can_set_the_size(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea cols="60" rows="15">My epic content</textarea>',
            Textarea::make()->value('My epic content')->size('60x15')
        );
    }
}
