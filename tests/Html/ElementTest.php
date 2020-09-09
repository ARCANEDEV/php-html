<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use Arcanedev\Html\Elements\Element;

/**
 * Class     ElementTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ElementTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_an_element(): void
    {
        static::assertEquals(
            '<foo></foo>',
            $this->html->element('foo')
        );
    }

    /** @test */
    public function it_can_add_conditional_changes(): void
    {
        $elt      = $this->html->element('foo');
        $callback = function (Element $elt) {
            return (clone $elt)->attributes(['class' => 'active']);
        };

        static::assertEquals(
            '<foo class="active"></foo>',
            $elt->if(true, $callback)
        );

        static::assertEquals(
            '<foo></foo>',
            $elt->if(false, $callback)
        );

        static::assertEquals(
            '<foo class="active"></foo>',
            $elt->unless(false, $callback)
        );

        static::assertEquals(
            '<foo></foo>',
            $elt->unless(true, $callback)
        );
    }

    /** @test */
    public function it_can_set_an_attribute_with_attribute_if(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div foo="bar"></div>',
            $this->html->div()
                ->attributeIf(true, 'foo', 'bar')
                ->attributeIf(false, 'bar', 'baz')
                ->render()
        );

        static::assertHtmlStringEqualsHtmlString(
            '<div foo="bar"></div>',
            $this->html->div()
                ->attributeUnless(false, 'foo', 'bar')
                ->attributeUnless(true, 'bar', 'baz')
                ->render()
        );

        static::assertHtmlStringEqualsHtmlString(
            '<input required>',
            $this->html->input()
                ->attributeUnless(false, 'required')
                ->render()
        );
    }
}
