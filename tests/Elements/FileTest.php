<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\File;

/**
 * Class     FileTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class FileTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_file(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file">',
            File::make()
        );
    }

    /** @test */
    public function it_can_create_with_autofocus_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file" autofocus>',
            File::make()->autofocus()
        );
    }

    /** @test */
    public function it_can_create_with_autofocus_attribute_when_passing_true(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file" autofocus>',
            File::make()->autofocus(true)
        );
    }

    /** @test */
    public function it_wont_create_a_file_that_has_autofocus_when_passing_false(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file">',
            File::make()->autofocus(false)
        );
    }

    /** @test */
    public function it_can_create_with_required_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file" required>',
            File::make()->required()
        );
    }

    /** @test */
    public function it_can_create_with_a_name(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file" name="file">',
            File::make()->name('file')
        );
    }

    /** @test */
    public function it_can_create_with_a_name_and_id(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file" id="file" name="file">',
            File::make()->name('file')->id('file')
        );
    }

    /** @test */
    public function it_can_create_with_accept_audio(): void
    {
        $expected = '<input type="file" accept="audio/*">';

        static::assertHtmlStringEqualsHtmlString($expected, File::make()->accept(File::ACCEPT_AUDIO));
        static::assertHtmlStringEqualsHtmlString($expected, File::make()->acceptAudio());
    }

    /** @test */
    public function it_can_create_with_accept_video(): void
    {
        $expected = '<input type="file" accept="video/*">';

        static::assertHtmlStringEqualsHtmlString($expected, File::make()->accept(File::ACCEPT_VIDEO));
        static::assertHtmlStringEqualsHtmlString($expected, File::make()->acceptVideo());
    }

    /** @test */
    public function it_can_create_with_accept_image(): void
    {
        $expected = '<input type="file" accept="image/*">';

        static::assertHtmlStringEqualsHtmlString($expected, File::make()->accept(File::ACCEPT_IMAGE));
        static::assertHtmlStringEqualsHtmlString($expected, File::make()->acceptImage());
    }

    /** @test */
    public function it_can_create_with_custom_accept(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file" accept=".jpg">',
            File::make()->accept('.jpg')
        );
    }

    /** @test */
    public function it_can_create_with_multiple_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file" multiple>',
            File::make()->multiple()
        );
    }
}
