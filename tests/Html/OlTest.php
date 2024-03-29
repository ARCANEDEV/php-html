<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use PHPUnit\Framework\Attributes\Test;

/**
 * Class     OlTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class OlTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_make_list(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<ol></ol>',
            $this->html->ol()
        );

        static::assertHtmlStringEqualsHtmlString(
            '<ol class="list-unstyled"></ol>',
            $this->html->ol(['class' => 'list-unstyled'])
        );
    }

    #[Test]
    public function it_can_add_items(): void
    {
        $ol = $this->html->ol();

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
            '<ol>' .
                '<li>Item 1</li>' .
                '<li>Item 2</li>' .
                '<li>Item 3</li>' .
            '</ol>',
            $ol
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
            '<ol>' .
                '<li><a href="#">Item 1</a></li>' .
                '<li><a href="#">Item 2</a></li>' .
                '<li><a href="#">Item 3</a></li>' .
            '</ol>',
            $this->html->ol()->items($items)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<ol class="list-group">' .
                '<li class="list-group-item"><a href="#">Item 1</a></li>' .
                '<li class="list-group-item"><a href="#">Item 2</a></li>' .
                '<li class="list-group-item"><a href="#">Item 3</a></li>' .
            '</ol>',
            $this->html
                ->ol(['class' => 'list-group'])
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
            '<ol>' .
                '<li>Item 1</li>' .
                '<li>Item 2</li>' .
                '<li>Item 3</li>' .
            '</ol>',
            $this->html->ol()->items($items)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<ol class="list-group">' .
                '<li class="list-group-item">Item 1</li>' .
                '<li class="list-group-item">Item 2</li>' .
                '<li class="list-group-item">Item 3</li>' .
            '</ol>',
            $this->html
                ->ol(['class' => 'list-group'])
                ->items($items, ['class' => 'list-group-item'])
        );
    }
}
