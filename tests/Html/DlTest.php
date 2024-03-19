<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use PHPUnit\Framework\Attributes\Test;

/**
 * Class     DlTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class DlTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_be_instantiated(): void
    {
        $dl = $this->html->dl();

        $expectations = [
            \Arcanedev\Html\Elements\HtmlElement::class,
            \Arcanedev\Html\Elements\Dl::class,
        ];

        foreach ($expectations as $expected) {
            static::assertInstanceOf($expected, $dl);
        }
    }

    #[Test]
    public function it_can_make_list(): void
    {
        $dl = $this->html->dl();

        static::assertHtmlStringEqualsHtmlString(
            '<dl></dl>',
            $dl
        );

        static::assertHtmlStringEqualsHtmlString(
            '<dl class="list-unstyled"></dl>',
            $this->html->dl(['class' => 'list-unstyled'])
        );
    }

    #[Test]
    public function it_can_add_items(): void
    {
        $dl    = $this->html->dl();
        $count = 0;

        static::assertCount($count, $dl->getChildren());

        $items = [
            'Term 1' => 'Definition 1',
            'Term 2' => 'Definition 2',
            'Term 3' => 'Definition 3',
        ];

        foreach ($items as $term => $definition) {
            $dl = $dl->dt($term);
            $count++;

            $dl = $dl->dd($definition);
            $count++;

            static::assertCount($count, $dl->getChildren());
        }

        static::assertHtmlStringEqualsHtmlString(
            '<dl>' .
                '<dt>Term 1</dt>' .
                '<dd>Definition 1</dd>' .
                '<dt>Term 2</dt>' .
                '<dd>Definition 2</dd>' .
                '<dt>Term 3</dt>' .
                '<dd>Definition 3</dd>' .
            '</dl>',
            $dl
        );
    }

    #[Test]
    public function it_can_add_html_items(): void
    {
        $items = [
            'Term 1' => 'Definition 1',
            'Term 2' => 'Definition 2',
            'Term 3' => 'Definition 3',
        ];

        static::assertHtmlStringEqualsHtmlString(
            '<dl>' .
                '<dt>Term 1</dt>' .
                '<dd>Definition 1</dd>' .
                '<dt>Term 2</dt>' .
                '<dd>Definition 2</dd>' .
                '<dt>Term 3</dt>' .
                '<dd>Definition 3</dd>' .
            '</dl>',
            $this->html->dl()->items($items)
        );
    }

    #[Test]
    public function it_can_add_multiple_items_at_once_with_custom_attributes(): void
    {
        $items = [
            'Term 1' => 'Definition 1',
            'Term 2' => 'Definition 2',
            'Term 3' => 'Definition 3',
        ];

        static::assertHtmlStringEqualsHtmlString(
            '<dl>' .
                '<dt class="list-item-term">Term 1</dt>' .
                '<dd class="list-item-definition">Definition 1</dd>' .
                '<dt class="list-item-term">Term 2</dt>' .
                '<dd class="list-item-definition">Definition 2</dd>' .
                '<dt class="list-item-term">Term 3</dt>' .
                '<dd class="list-item-definition">Definition 3</dd>' .
            '</dl>',
            $this->html->dl()->items($items, [
                'dt' => ['class' => 'list-item-term'],
                'dd' => ['class' => 'list-item-definition']
            ])
        );
    }
}
