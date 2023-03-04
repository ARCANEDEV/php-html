<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\HtmlElement;

/**
 * Class     HtmlElementTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class HtmlElementTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_register_a_macro(): void
    {
        HtmlElement::macro('btnPrimary', function () {
            /** @var \Arcanedev\Html\Elements\HtmlElement $this */
            return $this->class('btn btn-primary');
        });

        $elt = HtmlElement::withTag('a');

        static::assertEquals('<a></a>', $elt->toHtml());
        static::assertEquals('<a class="btn btn-primary"></a>', $elt->btnPrimary()->toHtml());
    }
}
