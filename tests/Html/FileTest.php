<?php namespace Arcanedev\Html\Tests\Html;

/**
 * Class     FileTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class FileTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_file_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file">',
            $this->html->file()
        );
    }

    /** @test */
    public function it_can_create_a_file_input_with_a_name()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="archives" type="file" name="archives">',
            $this->html->file('archives')
        );
    }
}
