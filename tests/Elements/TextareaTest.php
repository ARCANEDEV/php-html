<?php namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Textarea;

/**
 * Class     TextareaTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class TextareaTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea></textarea>',
            Textarea::make()
        );
    }

    /** @test */
    public function it_can_create_with_autofocus_attribute()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea autofocus></textarea>',
            Textarea::make()->autofocus()
        );
    }

    /** @test */
    public function it_can_create_with_a_placeholder()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea placeholder="Lorem ipsum"></textarea>',
            Textarea::make()->placeholder('Lorem ipsum')
        );
    }

    /** @test */
    public function it_can_create_with_a_name()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea name="text"></textarea>',
            Textarea::make()->name('text')
        );
    }

    /** @test */
    public function it_can_create_with_a_value()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea>My epic</textarea>',
            Textarea::make()->value('My epic')
        );
    }

    /** @test */
    public function it_can_create_with_required_attribute()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<textarea required>My epic</textarea>',
            Textarea::make()->value('My epic')->required()
        );
    }
}
