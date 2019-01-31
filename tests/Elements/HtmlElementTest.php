<?php namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Element;

/**
 * Class     HtmlElementTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class HtmlElementTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_register_a_macro()
    {
        Element::macro('btnPrimary', function () {
            return $this->class('btn btn-primary');
        });

        $elt = Element::withTag('a');

        static::assertEquals('<a></a>', $elt->toHtml());
        static::assertEquals('<a class="btn btn-primary"></a>', $elt->btnPrimary()->toHtml());
    }
}
