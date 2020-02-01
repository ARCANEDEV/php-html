<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\A;
use Arcanedev\Html\Elements\Ul;

/**
 * Class     UlTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class UlTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_be_instantiated(): void
    {
        $ul = Ul::make();

        $expectations = [
            \Arcanedev\Html\Elements\HtmlElement::class,
            \Arcanedev\Html\Elements\ListElement::class,
            \Arcanedev\Html\Elements\Ul::class,
        ];

        foreach ($expectations as $expected) {
            static::assertInstanceOf($expected, $ul);
        }
    }

    /** @test */
    public function it_can_make_list(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<ul></ul>',
            Ul::make()
        );

        static::assertHtmlStringEqualsHtmlString(
            '<ul class="list-unstyled"></ul>',
            Ul::make()->class('list-unstyled')
        );
    }

    /** @test */
    public function it_can_add_items(): void
    {
        $ul = Ul::make();

        static::assertCount(0, $ul->getChildren());

        $items = [
            'Item 1',
            'Item 2',
            'Item 3',
        ];

        foreach ($items as $index => $item) {
            $ul = $ul->item($item);

            static::assertCount($index + 1, $ul->getChildren());
        }

        static::assertHtmlStringEqualsHtmlString(
            '<ul>'.
                '<li>Item 1</li>'.
                '<li>Item 2</li>'.
                '<li>Item 3</li>'.
            '</ul>',
            $ul
        );
    }

    /** @test */
    public function it_can_add_html_items(): void
    {
        $items = collect([
            A::make()->href('#')->html('Item 1'),
            A::make()->href('#')->html('Item 2'),
            A::make()->href('#')->html('Item 3'),
        ]);

        static::assertHtmlStringEqualsHtmlString(
            '<ul>'.
                '<li><a href="#">Item 1</a></li>'.
                '<li><a href="#">Item 2</a></li>'.
                '<li><a href="#">Item 3</a></li>'.
            '</ul>',
            Ul::make()->items($items)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<ul class="list-group">'.
                '<li class="list-group-item"><a href="#">Item 1</a></li>'.
                '<li class="list-group-item"><a href="#">Item 2</a></li>'.
                '<li class="list-group-item"><a href="#">Item 3</a></li>'.
            '</ul>',
            Ul::make()
                ->attributes(['class' => 'list-group'])
                ->items($items, ['class' => 'list-group-item'])
        );
    }

    /** @test */
    public function it_can_add_multiple_items_at_once(): void
    {
        $items = [
            'Item 1',
            'Item 2',
            'Item 3',
        ];

        static::assertHtmlStringEqualsHtmlString(
            '<ul>'.
                '<li>Item 1</li>'.
                '<li>Item 2</li>'.
                '<li>Item 3</li>'.
            '</ul>',
            Ul::make()->items($items)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<ul class="list-group">'.
                '<li class="list-group-item">Item 1</li>'.
                '<li class="list-group-item">Item 2</li>'.
                '<li class="list-group-item">Item 3</li>'.
            '</ul>',
            Ul::make()
                ->attributes(['class' => 'list-group'])
                ->items($items, ['class' => 'list-group-item'])
        );
    }

    /** @test */
    public function it_can_handle_nested_items(): void
    {
        $items = [
            'Item 1',
            'Item 2',
            ['Sub Item 1', 'Sub Item 2', 'Sub Item 3'],
        ];

        static::assertHtmlStringEqualsHtmlString(
            '<ul>'.
                '<li>Item 1</li>'.
                '<li>Item 2</li>'.
                '<li>'.
                    '<ul>'.
                        '<li>Sub Item 1</li>'.
                        '<li>Sub Item 2</li>'.
                        '<li>Sub Item 3</li>'.
                    '</ul>'.
                '</li>'.
            '</ul>',
            Ul::make()->items($items)
        );
    }
}
