<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Entities;

use Arcanedev\Html\Elements\Span;
use Arcanedev\Html\Entities\ChildrenCollection;
use Arcanedev\Html\Tests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;

/**
 * Class     ChildrenCollectionTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ChildrenCollectionTest extends TestCase
{
    /**
     * >DATA PROVIDER
     */
    public static function getInvalidChildrenToParseDataProvider(): array
    {
        return [
            [true],
            [false],
        ];
    }
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_be_instantiated(): void
    {
        $children = new ChildrenCollection();

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

    #[Test]
    public function it_can_parse_children(): void
    {
        $children = ChildrenCollection::parse(['foo', null, 'bar']);

        static::assertCount(3, $children);
        static::assertEquals(['foo', null, 'bar'], $children->all());
    }

    #[Test]
    public function it_can_convert_to_html(): void
    {
        $children = ChildrenCollection::parse(['foo', null, 'bar'], function ($child) {
            return $child !== null
                ? Span::make()->html($child)
                : $child;
        });

        static::assertCount(3, $children);
        static::assertEquals('<span>foo</span><span>bar</span>', $children->toHtml());
    }

    #[Test]
    #[DataProvider('getInvalidChildrenToParseDataProvider')]
    public function it_must_throw_exception_on_parse_with_invalid_child(mixed $child): void
    {
        $this->expectException(\Arcanedev\Html\Exceptions\InvalidChildException::class);

        ChildrenCollection::parse($child);
    }

    #[Test]
    #[DataProvider('getInvalidChildrenToParseDataProvider')]
    public function it_must_throw_exception_on_convert_to_html_with_invalid_child(mixed $child): void
    {
        $this->expectException(\Arcanedev\Html\Exceptions\InvalidChildException::class);

        ChildrenCollection::make([$child])->toHtml();
    }
}
