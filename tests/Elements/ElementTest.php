<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Div;
use Arcanedev\Html\Elements\Element;

/**
 * Class     ElementTest
 *
 * @package  Arcanedev\Html\Tests\Elements
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
            '<meta>',
            Element::withTag('meta')
        );
    }

    /** @test */
    public function it_can_create_an_element_with_attributes(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<meta name="csrf-token" content="csrf-token-value">',
            Element::withTag('meta')->attributes(['name' => 'csrf-token', 'content' => 'csrf-token-value'])
        );
    }

    /** @test */
    public function it_can_create_an_element_with_a_custom_tag(): void
    {
        static::assertSame(
            '<foo></foo>',
            Element::withTag('foo')->toHtml()
        );
    }

    /** @test */
    public function it_cant_create_an_element_without_a_tag(): void
    {
        $this->expectException(\Arcanedev\Html\Exceptions\MissingTagException::class);
        $this->expectExceptionMessage('Class Arcanedev\Html\Elements\Element has no `$tag` property or empty.');

        Element::make()->render();
    }

    /** @test */
    public function it_can_add_conditional_changes(): void
    {
        $elt      = Element::withTag('foo');
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
            Div::make()
                ->attributeIf(true, 'foo', 'bar')
                ->attributeIf(false, 'bar', 'baz')
                ->render()
        );

        static::assertHtmlStringEqualsHtmlString(
            '<div foo="bar"></div>',
            Element::withTag('div')
                ->attributeUnless(false, 'foo', 'bar')
                ->attributeUnless(true, 'bar', 'baz')
                ->render()
        );

        static::assertHtmlStringEqualsHtmlString(
            '<input required>',
            Element::withTag('input')
                ->attributeUnless(false, 'required')
                ->render()
        );
    }

    /** @test */
    public function it_can_get_class_list(): void
    {
        $elt = Element::withTag('a')->class('btn btn-primary');

        static::assertEquals(
            '<a class="btn btn-primary"></a>',
            $elt
        );

        static::assertInstanceOf(
            \Arcanedev\Html\Entities\Attributes\ClassAttribute::class,
            $elt->classList()
        );

        $elt->classList()->toggle('active');

        static::assertEquals(
            '<a class="btn btn-primary active"></a>',
            $elt
        );

        $elt->classList()->toggle('active');

        static::assertEquals(
            '<a class="btn btn-primary"></a>',
            $elt
        );
    }

    /** @test */
    public function it_can_push_class_to_class_list(): void
    {
        $elt = Element::withTag('a')->class('btn btn-primary');

        static::assertHtmlStringEqualsHtmlString(
            '<a class="btn btn-primary"></a>', $elt
        );
        static::assertCount(2, $elt->classList());

        $elt->pushClass('btn-block active');

        static::assertHtmlStringEqualsHtmlString(
            '<a class="btn btn-primary btn-block active"></a>', $elt
        );
        static::assertCount(4, $elt->classList());
    }

    /** @test */
    public function it_must_throw_exception_on_void_element_with_child_elements(): void
    {
        $this->expectException(\Arcanedev\Html\Exceptions\InvalidHtmlException::class);
        $this->expectExceptionMessage("Can't set inner contents on `br` because it's a void element");

        Element::withTag('br')->html('Hello');
    }
}
