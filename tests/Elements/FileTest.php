<?php namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\File;

/**
 * Class     FileTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class FileTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_file()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file">',
            File::make()
        );
    }

    /** @test */
    public function it_can_create_with_autofocus_attribute()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file" autofocus>',
            File::make()->autofocus()
        );
    }

    /** @test */
    public function it_can_create_with_required_attribute()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file" required>',
            File::make()->required()
        );
    }

    /** @test */
    public function it_can_create_with_a_name()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file" name="file">',
            File::make()->name('file')
        );
    }

    /** @test */
    public function it_can_create_with_a_name_and_id()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file" id="file" name="file">',
            File::make()->name('file')->id('file')
        );
    }

    /** @test */
    public function it_can_create_with_accept_audio()
    {
        $expected = '<input type="file" accept="audio/*">';

        static::assertHtmlStringEqualsHtmlString($expected, File::make()->accept(File::ACCEPT_AUDIO));
        static::assertHtmlStringEqualsHtmlString($expected, File::make()->acceptAudio());
    }

    /** @test */
    public function it_can_create_with_accept_video()
    {
        $expected = '<input type="file" accept="video/*">';

        static::assertHtmlStringEqualsHtmlString($expected, File::make()->accept(File::ACCEPT_VIDEO));
        static::assertHtmlStringEqualsHtmlString($expected, File::make()->acceptVideo());
    }

    /** @test */
    public function it_can_create_with_accept_image()
    {
        $expected = '<input type="file" accept="image/*">';

        static::assertHtmlStringEqualsHtmlString($expected, File::make()->accept(File::ACCEPT_IMAGE));
        static::assertHtmlStringEqualsHtmlString($expected, File::make()->acceptImage());
    }

    /** @test */
    public function it_can_create_with_custom_accept()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file" accept=".jpg">',
            File::make()->accept('.jpg')
        );
    }

    /** @test */
    public function it_can_create_with_multiple_attribute()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file" multiple>',
            File::make()->multiple()
        );
    }
}
