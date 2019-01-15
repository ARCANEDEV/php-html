<?php namespace Arcanedev\Html\Tests;

use Arcanedev\Html\Html;
use Illuminate\Support\HtmlString;

/**
 * Class     HtmlTest
 *
 * @package  Arcanedev\Html\Tests
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class HtmlTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  \Arcanedev\Html\Html */
    private $html;

    /* -----------------------------------------------------------------
     |  Main Tests
     | -----------------------------------------------------------------
     */

    protected function setUp()
    {
        parent::setUp();

        $this->html = new Html;
    }

    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_make_checkbox()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="is_checked" name="is_checked" type="checkbox" value="1">',
            $this->html->checkbox('is_checked')
        );

        static::assertHtmlStringEqualsHtmlString(
            '<input checked="checked" id="is_checked" name="is_checked" type="checkbox" value="1">',
            $this->html->checkbox('is_checked', true)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<input id="is_checked" name="is_checked" type="checkbox" value="yes">',
            $this->html->checkbox('is_checked', false, 'yes')
        );
    }

    /** @test */
    public function it_can_make_class_attribute()
    {
        static::assertSame(
            'class="btn btn-sm btn-primary"',
            $this->html->class('btn btn-sm btn-primary')
        );
    }
}
