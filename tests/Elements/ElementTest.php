<?php namespace Arcanedev\Html\Tests\Elements;

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
    public function it_can_create_an_element()
    {
        static::assertEquals(
            '<meta>',
            Element::withTag('meta')
        );
    }

    /** @test */
    public function it_can_create_an_element_with_attributes()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<meta name="csrf-token" content="csrf-token-value">',
            Element::withTag('meta')->attributes(['name' => 'csrf-token', 'content' => 'csrf-token-value'])
        );
    }

    /** @test */
    public function it_can_create_an_element_with_a_custom_tag()
    {
        static::assertSame(
            '<foo></foo>',
            Element::withTag('foo')->toHtml()
        );
    }

    /**
     * @test
     *
     * @expectedException         \Arcanedev\Html\Exceptions\MissingTag
     * @expectedExceptionMessage  Class Arcanedev\Html\Elements\Element has no `$tag` property or empty.
     */
    public function it_cant_create_an_element_without_a_tag()
    {
        Element::make()->render();
    }

    /** @test */
    public function it_can_add_conditional_changes()
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
    public function it_can_set_an_attribute_with_attribute_if()
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
}
