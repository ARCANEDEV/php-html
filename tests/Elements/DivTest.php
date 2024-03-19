<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Div;
use Arcanedev\Html\Elements\HtmlElement;
use Arcanedev\Html\Entities\Attributes\MiscAttribute;
use Arcanedev\Html\Exceptions\InvalidChildException;
use Arcanedev\Html\Exceptions\InvalidHtmlException;
use BadMethodCallException;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;

/**
 * Class     DivTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class DivTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Data Providers
     | -----------------------------------------------------------------
     */

    /**
     * Get the custom styles (data provider).
     */
    public static function getCustomStylesDP(): array
    {
        return [
            [
                [],
                '<div></div>'
            ],
            [
                ['width' => '20px', 'background-color' => 'red'],
                '<div style="width: 20px; background-color: red"></div>'
            ],
        ];
    }

    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_create(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div></div>',
            Div::make()
        );
    }

    #[Test]
    public function it_can_set_an_attribute_with_set_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div foo="bar"></div>',
            Div::make()->attribute('foo', 'bar')->render()
        );
    }

    #[Test]
    public function it_can_set_an_attribute_to_null(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div foo=""></div>',
            Div::make()->attribute('foo')->render()
        );
    }

    #[Test]
    public function it_can_set_an_attribute_with_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div foo="bar"></div>',
            Div::make()->attribute('foo', 'bar')->render()
        );
    }

    #[Test]
    public function it_can_set_an_attribute_with_attribute_if(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div foo="bar"></div>',
            Div::make()->attributeIf(true, 'foo', 'bar')->attributeIf(false, 'bar', 'baz')->render()
        );

        static::assertHtmlStringEqualsHtmlString(
            '<div foo="bar"></div>',
            Div::make()->attributeUnless(false, 'foo', 'bar')->attributeUnless(true, 'bar', 'baz')->render()
        );
    }

    #[Test]
    public function it_can_set_an_class_with_class_if(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div class="bar"></div>',
            Div::make()->classIf(true, 'bar')->classIf(false, 'baz')->render()
        );
    }

    #[Test]
    public function it_can_not_accept_any_if_method(): void
    {
        $this->expectException(BadMethodCallException::class);

        Div::make()->barIf(true, 'bar')->render();
    }

    #[Test]
    public function it_can_forget_an_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div></div>',
            Div::make()->attribute('foo', 'bar')->forgetAttribute('foo')->render()
        );
    }

    #[Test]
    public function it_can_get_an_attribute(): void
    {
        $element = Div::make()->attribute('foo', 'bar');

        static::assertTrue($element->hasAttribute('foo'));

        $attribute = $element->getAttribute('foo');

        static::assertInstanceOf(MiscAttribute::class, $attribute);
        static::assertSame('foo', $attribute->name());
        static::assertSame('bar', $attribute->value());
    }

    #[Test]
    public function it_must_return_null_if_an_attribute_does_not_exists(): void
    {
        $element = Div::make();

        static::assertFalse($element->hasAttribute('foo'));
        static::assertNull($element->getAttribute('foo'));
    }

    #[Test]
    public function it_can_set_an_id(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div id="main"></div>',
            Div::make()->id('main')->render()
        );
    }

    #[Test]
    public function multiple_attributes_can_be_set_with_attributes(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div foo bar="baz"></div>',
            Div::make()->attributes(['foo', 'bar' => 'baz'])->render()
        );
    }

    #[Test]
    public function it_can_add_a_class_with_add_class(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div class="foo"></div>',
            Div::make()->class('foo')->render()
        );

        static::assertHtmlStringEqualsHtmlString(
            '<div class="foo bar"></div>',
            Div::make()->class(['foo', 'bar'])->render()
        );

        static::assertHtmlStringEqualsHtmlString(
            '<div class="foo"></div>',
            Div::make()->class(['foo', 'bar' => false])->render()
        );
    }

    #[Test]
    public function it_can_add_a_class_with_class(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div class="foo"></div>',
            Div::make()->class('foo')->render()
        );
    }

    #[Test]
    public function it_can_set_style_from_a_string(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div style="color: red"></div>',
            Div::make()->style('color: red')->render()
        );
    }

    #[Test]
    public function it_can_set_style_from_an_array(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div style="color: red"></div>',
            Div::make()->style(['color' => 'red'])->render()
        );
    }

    #[Test]
    public function it_can_set_text(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div>Hi &amp; Bye</div>',
            Div::make()->text('Hi & Bye')->render()
        );
    }

    #[Test]
    public function it_can_set_html(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div><span>Yo</span></div>',
            Div::make()->html('<span>Yo</span>')->render()
        );
    }

    #[Test]
    public function it_can_set_html_from_htmlstring(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div><span>Yo</span></div>',
            Div::make()->html(new HtmlString('<span>Yo</span>'))->render()
        );
    }

    #[Test]
    public function it_cant_set_html_if_its_not_an_html_element(): void
    {
        $this->expectException(InvalidChildException::class);

        Div::make()->html(true)->render();
    }

    #[Test]
    public function setting_text_overwrites_existing_children(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div>Hi</div>',
            Div::make()->addChild(Div::make())->text('Hi')->render()
        );
    }

    #[Test]
    public function it_cant_add_child_if_its_not_an_html_element_or_a_string(): void
    {
        $this->expectException(InvalidChildException::class);

        Div::make()->addChild(true)->render();
    }

    #[Test]
    public function it_cant_set_text_if_its_a_void_element(): void
    {
        $this->expectException(InvalidHtmlException::class);
        $this->expectExceptionMessage("Can't set inner contents on `img` because it's a void element");

        $img = new class () extends HtmlElement {
            protected string $tag = 'img';
        };

        $img->text('Hi');
    }

    #[Test]
    public function it_can_add_a_child_from_a_string(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div>Hello</div>',
            Div::make()->addChild('Hello')
        );
    }

    #[Test]
    public function it_can_add_a_child_from_an_element(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div></div>',
            Div::make()->addChild(Div::make()->text('Hello'))
        );
    }

    #[Test]
    public function it_can_add_children_from_an_array_of_strings(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div>Helloworld</div>',
            Div::make()->addChild(['Hello', 'world'])
        );
    }

    #[Test]
    public function it_can_add_children_from_an_array_of_elements(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div><div>World</div></div>',
            Div::make()->children([Div::make()->text('Hello'), Div::make()->text('World')])
        );
    }

    #[Test]
    public function it_can_add_children_from_an_iterable(): void
    {
        $children = Collection::make([Div::make()->text('Hello'), Div::make()->text('World')]);

        static::assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div><div>World</div></div>',
            Div::make()->addChild($children)
        );
    }

    #[Test]
    public function it_doesnt_add_a_child_if_the_child_is_null(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div></div>',
            Div::make()->addChild(null)
        );
    }

    #[Test]
    public function it_can_transform_children_when_they_are_added(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div><div>World</div></div>',
            Div::make()->children(['Hello', 'World'], [$this, 'wrapInDiv'])
        );

        static::assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div><div>World</div></div>',
            Div::make()->children(['Hello', 'World'], [$this, 'wrapInDiv'])
        );

        static::assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div><div>World</div></div>',
            Div::make()->children(['Hello', 'World'], [$this, 'wrapInDiv'])
        );

        static::assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div><div>World</div></div>',
            Div::make()->children(['Hello', 'World'], [$this, 'wrapInDiv'])
        );
    }

    #[Test]
    public function it_can_add_a_child_with_add_child(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div></div>',
            Div::make()->addChild(Div::make()->text('Hello'))
        );
    }

    #[Test]
    public function it_can_add_a_child_with_child(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div></div>',
            Div::make()->addChild(Div::make()->text('Hello'))
        );
    }

    #[Test]
    public function it_can_add_children_with_children(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div></div>',
            Div::make()->children(Div::make()->text('Hello'))
        );
    }

    #[Test]
    public function it_can_prepend_children_with_prepend_children(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div><div>World</div><div>Hello</div></div>',
            Div::make()
                ->children(Div::make()->text('Hello'))
                ->prependChildren(Div::make()->text('World'))
        );
    }

    #[Test]
    public function it_can_prepend_children_with_prepend_child(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div><div>World</div><div>Hello</div></div>',
            Div::make()
                ->addChild(Div::make()->text('Hello'))
                ->prependChild(Div::make()->text('World'))
        );
    }

    #[Test]
    public function it_can_transform_children_when_they_are_prepended(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div><div>World</div><div>Hello</div></div>',
            Div::make()
                ->addChild(Div::make()->text('Hello'))
                ->prependChildren(['World'], [$this, 'wrapInDiv'])
        );

        static::assertHtmlStringEqualsHtmlString(
            '<div><div>World</div><div>Hello</div></div>',
            Div::make()
                ->addChild(Div::make()->text('Hello'))
                ->prependChild('World', [$this, 'wrapInDiv'])
        );
    }

    #[Test]
    public function it_can_conditionally_transform_an_element(): void
    {
        $div = Div::make()
            ->if(true, fn(Div $div) => $div->class('foo'))
            ->if(false, fn(Div $div) => $div->class('bar'));

        static::assertHtmlStringEqualsHtmlString('<div class="foo"></div>', $div);

        $div = Div::make()
            ->unless(false, fn(Div $div) => $div->class('foo'))
            ->unless(true, fn(Div $div) => $div->class('bar'));

        static::assertHtmlStringEqualsHtmlString('<div class="foo"></div>', $div);
    }

    public function wrapInDiv(string $text): Div
    {
        return Div::make()->text($text);
    }

    #[Test]
    public function it_can_set_a_data_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div data-foo="bar"></div>',
            Div::make()->data('foo', 'bar')->render()
        );
    }

    #[Test]
    #[DataProvider('getCustomStylesDP')]
    public function it_can_create_with_custom_styles(array $styles, string $expected): void
    {
        static::assertHtmlStringEqualsHtmlString(
            $expected,
            Div::make()->styleIf( ! empty($styles), $styles)->toHtml()
        );

        static::assertHtmlStringEqualsHtmlString(
            $expected,
            Div::make()->styleUnless(empty($styles), $styles)->toHtml()
        );
    }
}
