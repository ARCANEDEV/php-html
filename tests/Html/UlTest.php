<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use PHPUnit\Framework\Attributes\Test;

/**
 * Class     UlTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class UlTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_make_list(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<ul></ul>',
            $this->html->ul()
        );

        static::assertHtmlStringEqualsHtmlString(
            '<ul class="list-unstyled"></ul>',
            $this->html->ul(['class' => 'list-unstyled'])
        );
    }

    #[Test]
    public function it_can_add_items(): void
    {
        $ul = $this->html->ul();

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
            '<ul>' .
                '<li>Item 1</li>' .
                '<li>Item 2</li>' .
                '<li>Item 3</li>' .
            '</ul>',
            $ul
        );
    }

    #[Test]
    public function it_can_add_html_items(): void
    {
        $items = collect([
            $this->html->a('#', 'Item 1'),
            $this->html->a('#', 'Item 2'),
            $this->html->a('#', 'Item 3'),
        ]);

        static::assertHtmlStringEqualsHtmlString(
            '<ul>' .
                '<li><a href="#">Item 1</a></li>' .
                '<li><a href="#">Item 2</a></li>' .
                '<li><a href="#">Item 3</a></li>' .
            '</ul>',
            $this->html->ul()->items($items)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<ul class="list-group">' .
                '<li class="list-group-item"><a href="#">Item 1</a></li>' .
                '<li class="list-group-item"><a href="#">Item 2</a></li>' .
                '<li class="list-group-item"><a href="#">Item 3</a></li>' .
            '</ul>',
            $this->html
                ->ul(['class' => 'list-group'])
                ->items($items, ['class' => 'list-group-item'])
        );
    }

    #[Test]
    public function it_can_add_multiple_items_at_once(): void
    {
        $items = [
            'Item 1',
            'Item 2',
            'Item 3',
        ];

        static::assertHtmlStringEqualsHtmlString(
            '<ul>' .
                '<li>Item 1</li>' .
                '<li>Item 2</li>' .
                '<li>Item 3</li>' .
            '</ul>',
            $this->html->ul()->items($items)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<ul class="list-group">' .
                '<li class="list-group-item">Item 1</li>' .
                '<li class="list-group-item">Item 2</li>' .
                '<li class="list-group-item">Item 3</li>' .
            '</ul>',
            $this->html
                ->ul(['class' => 'list-group'])
                ->items($items, ['class' => 'list-group-item'])
        );
    }
}
