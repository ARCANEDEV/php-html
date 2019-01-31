<?php namespace Arcanedev\Html\Tests\Entities;

use Arcanedev\Html\Elements\Span;
use Arcanedev\Html\Entities\ChildrenCollection;
use Arcanedev\Html\Tests\TestCase;

/**
 * Class     ChildrenCollectionTest
 *
 * @package  Arcanedev\Html\Tests\Entities
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ChildrenCollectionTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_be_instantiated()
    {
        $children = new ChildrenCollection;

        $expectations = [
            \Arcanedev\Html\Contracts\Renderable::class,
            \Illuminate\Support\Collection::class,
        ];

        foreach ($expectations as $expected) {
            static::assertInstanceOf($expected, $children);
        }

        static::assertCount(0, $children);
        static::assertTrue($children->isEmpty());
    }

    /** @test */
    public function it_can_parse_children()
    {
        $children = ChildrenCollection::parse(['foo', null, 'bar']);

        static::assertCount(3, $children);
        static::assertEquals(['foo', null, 'bar'], $children->all());
    }

    /** @test */
    public function it_can_convert_to_html()
    {
        $children = ChildrenCollection::parse(['foo', null, 'bar'], function ($child) {
            return ! is_null($child)
                ? Span::make()->html($child)
                : $child;
        });

        static::assertCount(3, $children);
        static::assertEquals('<span>foo</span><span>bar</span>', $children->toHtml());
    }

    /**
     * @test
     *
     * @dataProvider getInvalidChildrenToParseDataProvider
     *
     * @param  mixed  $child
     *
     * @expectedException  \Arcanedev\Html\Exceptions\InvalidChildException
     */
    public function it_must_throw_exception_on_parse_with_invalid_child($child)
    {
        ChildrenCollection::parse($child);
    }

    /**
     * @test
     *
     * @dataProvider getInvalidChildrenToParseDataProvider
     *
     * @param  mixed  $child
     *
     * @expectedException  \Arcanedev\Html\Exceptions\InvalidChildException
     */
    public function it_must_throw_exception_on_convert_to_html_with_invalid_child($child)
    {
        ChildrenCollection::make([$child])->toHtml();
    }

    /**
     * >DATA PROVIDER
     *
     * @see it_must_throw_exception_on_parse_with_invalid_child
     * @see it_must_throw_exception_on_convert_to_html_with_invalid_child
     *
     * @return array
     */
    public function getInvalidChildrenToParseDataProvider()
    {
        return [
            [true],
            [1],
            [.1],
        ];
    }
}
