<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\A;
use Arcanedev\Html\Elements\Ol;

/**
 * Class     OlTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class OlTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_be_instantiated(): void
    {
        $ol = Ol::make();

        $expectations = [
            \Arcanedev\Html\Elements\HtmlElement::class,
            \Arcanedev\Html\Elements\ListElement::class,
            \Arcanedev\Html\Elements\Ol::class,
        ];

        foreach ($expectations as $expected) {
            static::assertInstanceOf($expected, $ol);
        }
    }

    /** @test */
    public function it_can_make_list(): void
    {
        $ol = Ol::make();

        static::assertHtmlStringEqualsHtmlString('<ol></ol>', $ol);

        static::assertHtmlStringEqualsHtmlString(
            '<ol class="list-unstyled"></ol>',
            Ol::make()->class('list-unstyled')
        );
    }

    /** @test */
    public function it_can_add_items(): void
    {
        $ol = Ol::make();

        static::assertCount(0, $ol->getChildren());

        $items = [
            'Item 1',
            'Item 2',
            'Item 3',
        ];

        foreach ($items as $index => $item) {
            $ol = $ol->item($item);

            static::assertCount($index + 1, $ol->getChildren());
        }

        static::assertHtmlStringEqualsHtmlString(
            '<ol>'.
                '<li>Item 1</li>'.
                '<li>Item 2</li>'.
                '<li>Item 3</li>'.
            '</ol>',
            $ol
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
            '<ol>'.
                '<li><a href="#">Item 1</a></li>'.
                '<li><a href="#">Item 2</a></li>'.
                '<li><a href="#">Item 3</a></li>'.
            '</ol>',
            Ol::make()->items($items)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<ol class="list-group">'.
                '<li class="list-group-item"><a href="#">Item 1</a></li>'.
                '<li class="list-group-item"><a href="#">Item 2</a></li>'.
                '<li class="list-group-item"><a href="#">Item 3</a></li>'.
            '</ol>',
            Ol::make()
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
            '<ol>'.
                '<li>Item 1</li>'.
                '<li>Item 2</li>'.
                '<li>Item 3</li>'.
            '</ol>',
            Ol::make()->items($items)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<ol class="list-group">'.
                '<li class="list-group-item">Item 1</li>'.
                '<li class="list-group-item">Item 2</li>'.
                '<li class="list-group-item">Item 3</li>'.
            '</ol>',
            Ol::make()
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
            '<ol>'.
                '<li>Item 1</li>'.
                '<li>Item 2</li>'.
                '<li>'.
                    '<ol>'.
                        '<li>Sub Item 1</li>'.
                        '<li>Sub Item 2</li>'.
                        '<li>Sub Item 3</li>'.
                    '</ol>'.
                '</li>'.
            '</ol>',
            Ol::make()->items($items)
        );
    }
}
