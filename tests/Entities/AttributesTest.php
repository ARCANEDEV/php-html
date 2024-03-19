<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Entities;

use Arcanedev\Html\Entities\Attributes;
use Arcanedev\Html\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

/**
 * Class     AttributesTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class AttributesTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_be_instantiated(): void
    {
        $attributes = new Attributes;

        static::assertTrue($attributes->isEmpty());
        static::assertEmpty($attributes->toArray());
        static::assertEmpty($attributes->render());
    }

    #[Test]
    public function it_accepts_classes_as_strings(): void
    {
        $attributes = (new Attributes)->addClass('foo bar');

        static::assertEquals(['class' => 'foo bar'], $attributes->toArray());
    }

    #[Test]
    public function it_accepts_classes_as_an_array(): void
    {
        $attributes = (new Attributes)->addClass(['foo', 'bar']);

        static::assertEquals(['class' => 'foo bar'], $attributes->toArray());
    }

    #[Test]
    public function it_can_add_classes_conditionally_with_an_associative_array(): void
    {
        $attributes = (new Attributes)->addClass([
            'foo' => true,
            'bar' => false,
        ]);

        static::assertEquals(['class' => 'foo'], $attributes->toArray());
    }

    #[Test]
    public function it_can_simultaneously_add_classes_conditionally_and_non_conditionally(): void
    {
        $attributes = (new Attributes)->addClass([
            'foo' => true,
            'bar' => false,
            'baz',
        ]);

        static::assertEquals(['class' => 'foo baz'], $attributes->toArray());
    }

    #[Test]
    public function it_accepts_attributes(): void
    {
        $attributes = new Attributes;
        $attributes->set('href', '#');
        $attributes->set('class', 'foobar');

        static::assertEquals(
            ['href' => '#', 'class' => 'foobar'],
            $attributes->toArray()
        );
    }

    #[Test]
    public function it_accepts_attributes_without_values(): void
    {
        $attributes = (new Attributes)->set('required');

        static::assertEquals(
            ['required' => null],
            $attributes->toArray()
        );
    }

    #[Test]
    public function it_can_forget_an_attribute(): void
    {
        $attributes = new Attributes;
        $attributes->set('href', '#');
        $attributes->forget('href');

        static::assertNull($attributes->get('href'));
    }

    #[Test]
    public function it_can_forget_its_classes(): void
    {
        $attributes = new Attributes;
        $attributes->addClass('foo');
        $attributes->forget('class');

        static::assertEmpty($attributes->get('class'));
    }

    #[Test]
    public function it_can_get_an_attribute(): void
    {
        $attributes = new Attributes;
        $attributes->set('foo', 'bar');

        $attribute = $attributes->get('foo');

        static::assertInstanceOf(Attributes\MiscAttribute::class, $attribute);
        static::assertSame('bar', $attribute->value());
    }

    #[Test]
    public function it_can_get_a_class_list(): void
    {
        $attributes = new Attributes;

        static::assertNull($attributes->get('class'));

        $attributes->addClass(['foo', 'bar']);

        static::assertSame('foo bar', $attributes->get('class')->value());
    }

    #[Test]
    public function it_returns_null_if_an_attribute_does_not_exist(): void
    {
        static::assertNull((new Attributes)->get('foo'));
    }

    #[Test]
    public function it_can_return_a_fallback_if_an_attribute_does_not_exist(): void
    {
        static::assertSame('bar', (new Attributes)->get('foo', 'bar'));
    }

    #[Test]
    public function it_accepts_multiple_attributes(): void
    {
        $attributes = new Attributes;
        $attributes->setMany([
            'name'  => 'email',
            'class' => 'foobar',
            'required',
        ]);

        static::assertEquals(
            ['name' => 'email', 'class' => 'foobar', 'required' => null],
            $attributes->toArray()
        );
    }

    #[Test]
    public function it_can_be_rendered_when_empty(): void
    {
        $attributes = new Attributes;

        static::assertSame('', $attributes->render());
    }

    #[Test]
    public function it_can_be_rendered_with_an_attribute(): void
    {
        $attributes = new Attributes;
        $attributes->set('foo', 'bar');

        static::assertSame('foo="bar"', $attributes->render());
    }

    #[Test]
    public function it_can_be_rendered_with_multiple_attributes(): void
    {
        $attributes = ['foo' => 'bar', 'baz' => 'qux'];
        $expected   = 'foo="bar" baz="qux"';

        static::assertSame($expected, (new Attributes($attributes))->render());
        static::assertSame($expected, (new Attributes)->setMany($attributes)->render());
        static::assertSame($expected, Attributes::make($attributes)->render());
    }

    #[Test]
    public function it_can_be_rendered_with_a_falsish_attribute(): void
    {
        $attributes = (new Attributes)->set('foo', '0');

        static::assertSame('foo="0"', $attributes->render());
    }

    #[Test]
    public function it_can_escape_values_when_rendered(): void
    {
        $attributes = (new Attributes)->set('foo', '<bar baz=""></bar>');

        static::assertSame('foo="&lt;bar baz=&quot;&quot;&gt;&lt;/bar&gt;"', $attributes->render());
    }

    #[Test]
    public function it_can_render_square_brackets(): void
    {
        $attributes = (new Attributes)->set('names[]', 'Sebastian');

        static::assertSame('names[]="Sebastian"', $attributes->render());
    }

    #[Test]
    public function it_can_determine_whether_an_attribute_exists(): void
    {
        $attributes = (new Attributes)->set('foo', 'bar');

        static::assertTrue($attributes->has('foo'));
        static::assertFalse($attributes->has('bar'));
    }
}
