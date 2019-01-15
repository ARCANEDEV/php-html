<?php namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Dl;

/**
 * Class     DlTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class DlTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_be_instantiated()
    {
        $dl = Dl::make();

        $expectations = [
            \Arcanedev\Html\Elements\HtmlElement::class,
        ];

        foreach ($expectations as $expected) {
            static::assertInstanceOf($expected, $dl);
        }
    }

    /** @test */
    public function it_can_make_list()
    {
        $dl = Dl::make();

        static::assertHtmlStringEqualsHtmlString(
            '<dl></dl>',
            $dl
        );

        static::assertHtmlStringEqualsHtmlString(
            '<dl class="list-unstyled"></dl>',
            Dl::make()->class('list-unstyled')
        );
    }

    /** @test */
    public function it_can_add_items()
    {
        $dl    = Dl::make();
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
            '<dl>'.
                '<dt>Term 1</dt>'.
                '<dd>Definition 1</dd>'.
                '<dt>Term 2</dt>'.
                '<dd>Definition 2</dd>'.
                '<dt>Term 3</dt>'.
                '<dd>Definition 3</dd>'.
            '</dl>',
            $dl
        );
    }

    /** @test */
    public function it_can_add_html_items()
    {
        $items = [
            'Term 1' => 'Definition 1',
            'Term 2' => 'Definition 2',
            'Term 3' => 'Definition 3',
        ];

        static::assertHtmlStringEqualsHtmlString(
            '<dl>'.
                '<dt>Term 1</dt>'.
                '<dd>Definition 1</dd>'.
                '<dt>Term 2</dt>'.
                '<dd>Definition 2</dd>'.
                '<dt>Term 3</dt>'.
                '<dd>Definition 3</dd>'.
            '</dl>',
            Dl::make()->items($items)
        );
    }

    /** @test */
    public function it_can_add_multiple_items_at_once_with_custom_attributes()
    {
        $items = [
            'Term 1' => 'Definition 1',
            'Term 2' => 'Definition 2',
            'Term 3' => 'Definition 3',
        ];

        static::assertHtmlStringEqualsHtmlString(
            '<dl>'.
                '<dt class="list-item-term">Term 1</dt>'.
                '<dd class="list-item-definition">Definition 1</dd>'.
                '<dt class="list-item-term">Term 2</dt>'.
                '<dd class="list-item-definition">Definition 2</dd>'.
                '<dt class="list-item-term">Term 3</dt>'.
                '<dd class="list-item-definition">Definition 3</dd>'.
            '</dl>',
            Dl::make()->items($items, [
                'dt' => ['class' => 'list-item-term'],
                'dd' => ['class' => 'list-item-definition']
            ])
        );
    }

    /** @test */
    public function it_can_add_multiple_items_with_multiple_definitions()
    {
        $items = [
            'Term 1' => 'Definition 1',
            'Term 2' => 'Definition 2',
            'Term 3' => ['Definition 3-1', 'Definition 3-2', 'Definition 3-3'],
        ];

        static::assertHtmlStringEqualsHtmlString(
            '<dl>'.
                '<dt>Term 1</dt>'.
                '<dd>Definition 1</dd>'.
                '<dt>Term 2</dt>'.
                '<dd>Definition 2</dd>'.
                '<dt>Term 3</dt>'.
                '<dd>Definition 3-1</dd>'.
                '<dd>Definition 3-2</dd>'.
                '<dd>Definition 3-3</dd>'.
            '</dl>',
            Dl::make()->items($items)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<dl>'.
                '<dt class="list-item-term">Term 1</dt>'.
                '<dd class="list-item-definition">Definition 1</dd>'.
                '<dt class="list-item-term">Term 2</dt>'.
                '<dd class="list-item-definition">Definition 2</dd>'.
                '<dt class="list-item-term">Term 3</dt>'.
                '<dd class="list-item-definition">Definition 3-1</dd>'.
                '<dd class="list-item-definition">Definition 3-2</dd>'.
                '<dd class="list-item-definition">Definition 3-3</dd>'.
            '</dl>',
            Dl::make()->items($items, [
                'dt' => ['class' => 'list-item-term'],
                'dd' => ['class' => 'list-item-definition']
            ])
        );
    }
}
