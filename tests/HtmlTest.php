<?php namespace Arcanedev\Html\Tests;

use Arcanedev\Html\Html;

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

    protected function setUp(): void
    {
        parent::setUp();

        $this->html = new Html;
    }

    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_make_class_attribute()
    {
        static::assertSame(
            'class="btn btn-sm btn-primary"',
            $this->html->class('btn btn-sm btn-primary')
        );
    }
}
