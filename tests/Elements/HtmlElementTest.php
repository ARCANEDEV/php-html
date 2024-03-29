<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\HtmlElement;
use Arcanedev\Html\Exceptions\MissingTagException;
use PHPUnit\Framework\Attributes\Test;

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

    #[Test]
    public function it_cant_be_instantiated_without_a_tag_name_on_the_class(): void
    {
        static::expectException(MissingTagException::class);

        $element = new class () extends HtmlElement {};

        $element->render();
    }

    #[Test]
    public function it_can_register_a_macro(): void
    {
        HtmlElement::macro('btnPrimary', function () {
            /** @var HtmlElement $this */
            return $this->class('btn btn-primary');
        });

        $elt = HtmlElement::withTag('a');

        static::assertEquals('<a></a>', $elt->toHtml());
        static::assertEquals('<a class="btn btn-primary"></a>', $elt->btnPrimary()->toHtml());
    }
}
