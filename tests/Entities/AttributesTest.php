<?php namespace Arcanedev\Html\Tests\Entities;

use Arcanedev\Html\Entities\Attributes;
use Arcanedev\Html\Tests\TestCase;

/**
 * Class     AttributesTest
 *
 * @package  Arcanedev\Html\Tests\Entities
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class AttributesTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_be_instantiated()
    {
        $attributes = new Attributes;

        static::assertTrue($attributes->isEmpty());
        static::assertEmpty($attributes->toArray());
        static::assertEmpty($attributes->render());
    }

    /** @test */
    public function it_accepts_classes_as_strings()
    {
        $attributes = (new Attributes)->addClass('foo bar');

        static::assertArraySubset(['class' => 'foo bar'], $attributes->toArray());
    }

    /** @test */
    public function it_accepts_classes_as_an_array()
    {
        $attributes = (new Attributes)->addClass(['foo', 'bar']);

        static::assertArraySubset(['class' => 'foo bar'], $attributes->toArray());
    }

    /** @test */
    public function it_can_add_classes_conditionally_with_an_associative_array()
    {
        $attributes = (new Attributes)->addClass([
            'foo' => true,
            'bar' => false,
        ]);

        static::assertArraySubset(['class' => 'foo'], $attributes->toArray());
    }

    /** @test */
    public function it_can_simultaneously_add_classes_conditionally_and_non_conditionally()
    {
        $attributes = (new Attributes)->addClass([
            'foo' => true,
            'bar' => false,
            'baz',
        ]);

        static::assertArraySubset(['class' => 'foo baz'], $attributes->toArray());
    }

    /** @test */
    public function it_accepts_attributes()
    {
        $attributes = new Attributes;
        $attributes->set('href', '#');
        $attributes->set('class', 'foobar');

        static::assertArraySubset(
            ['href' => '#', 'class' => 'foobar'],
            $attributes->toArray()
        );
    }

    /** @test */
    public function it_accepts_attributes_without_values()
    {
        $attributes = (new Attributes)->set('required');

        static::assertArraySubset(['required' => null], $attributes->toArray());
    }

    /** @test */
    public function it_can_forget_an_attribute()
    {
        $attributes = new Attributes;
        $attributes->set('href', '#');
        $attributes->forget('href');

        static::assertNull($attributes->get('href'));
    }

    /** @test */
    public function it_can_forget_its_classes()
    {
        $attributes = new Attributes;
        $attributes->addClass('foo');
        $attributes->forget('class');

        static::assertEmpty($attributes->get('class'));
    }

    /** @test */
    public function it_can_get_an_attribute()
    {
        $attributes = new Attributes;
        $attributes->set('foo', 'bar');

        $attribute = $attributes->get('foo');

        static::assertInstanceOf(\Arcanedev\Html\Entities\Attribute::class, $attribute);
        static::assertSame('bar', $attribute->value());
    }

    /** @test */
    public function it_can_get_a_class_list()
    {
        $attributes = new Attributes;

        static::assertNull($attributes->get('class'));

        $attributes->addClass(['foo', 'bar']);

        static::assertSame('foo bar', $attributes->get('class')->value());
    }

    /** @test */
    public function it_returns_null_if_an_attribute_does_not_exist()
    {
        static::assertNull((new Attributes)->get('foo'));
    }

    /** @test */
    public function it_can_return_a_fallback_if_an_attribute_does_not_exist()
    {
        static::assertSame('bar', (new Attributes)->get('foo', 'bar'));
    }

    /** @test */
    public function it_accepts_multiple_attributes()
    {
        $attributes = new Attributes;
        $attributes->setMany([
            'name'  => 'email',
            'class' => 'foobar',
            'required',
        ]);

        static::assertArraySubset(['name' => 'email', 'required' => null], $attributes->toArray());
    }

    /** @test */
    public function it_can_be_rendered_when_empty()
    {
        $attributes = new Attributes;

        static::assertSame('', $attributes->render());
    }

    /** @test */
    public function it_can_be_rendered_with_an_attribute()
    {
        $attributes = new Attributes;
        $attributes->set('foo', 'bar');

        static::assertSame('foo="bar"', $attributes->render());
    }

    /** @test */
    public function it_can_be_rendered_with_multiple_attributes()
    {
        $attributes = ['foo' => 'bar', 'baz' => 'qux'];
        $expected   = 'foo="bar" baz="qux"';

        static::assertSame($expected, (new Attributes($attributes))->render());
        static::assertSame($expected, (new Attributes)->setMany($attributes)->render());
        static::assertSame($expected, Attributes::make($attributes)->render());
    }

    /** @test */
    public function it_can_be_rendered_with_a_falsish_attribute()
    {
        $attributes = (new Attributes)->set('foo', '0');

        static::assertSame('foo="0"', $attributes->render());
    }

    /** @test */
    public function it_can_escape_values_when_rendered()
    {
        $attributes = (new Attributes)->set('foo', '<bar baz=""></bar>');

        static::assertSame('foo="&lt;bar baz=&quot;&quot;&gt;&lt;/bar&gt;"', $attributes->render());
    }

    /** @test */
    public function it_can_render_square_brackets()
    {
        $attributes = (new Attributes)->set('names[]', 'Sebastian');

        static::assertSame('names[]="Sebastian"', $attributes->render());
    }

    /** @test */
    public function it_can_determine_whether_an_attribute_exists()
    {
        $attributes = (new Attributes)->set('foo', 'bar');

        static::assertTrue($attributes->has('foo'));
        static::assertFalse($attributes->has('bar'));
    }
}
