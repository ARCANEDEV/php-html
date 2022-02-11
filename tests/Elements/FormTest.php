<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\{Form, Input};

/**
 * Class     FormTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class FormTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form></form>',
            Form::make()
        );
    }

    /** @test */
    public function it_can_split_form_tags(): void
    {
        $form = Form::make();

        static::assertSame('<form>', (string) $form->open());
        static::assertSame(
            '<form method="POST" action="contact">',
            (string) $form->method('POST')->action('contact')->open()
        );

        static::assertSame('</form>', (string) $form->close());
    }

    /** @test */
    public function it_can_create_with_a_custom_action(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form action="/submit"></form>',
            Form::make()->action('/submit')
        );
    }

    /** @test */
    public function it_can_create_with_a_custom_method(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form method="POST"></form>',
            Form::make()->method('POST')
        );
    }

    /** @test */
    public function it_can_create_with_accepts_files(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form enctype="multipart/form-data"></form>',
            Form::make()->acceptsFiles()
        );
    }

    /** @test */
    public function it_can_create_with_html_builder(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form method="POST" action="/submit"></form>',
            Form::make()->action('/submit')->method('DELETE')
        );
    }

    /** @test */
    public function it_can_create_a_form_with_a_novalidate_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form enctype="multipart/form-data" novalidate=""></form>',
            Form::make()->novalidate()->acceptsFiles()
        );
    }

    /** @test */
    public function it_can_create_a_form_that_has_novalidate_when_passing_true(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form enctype="multipart/form-data" novalidate=""></form>',
            Form::make()->novalidate(true)->acceptsFiles()
        );
    }

    /** @test */
    public function it_wont_create_a_form_that_has_novalidate_when_passing_false(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form enctype="multipart/form-data"></form>',
            Form::make()->novalidate(false)->acceptsFiles()
        );
    }

    /** @test */
    public function it_can_add_multiple_children_type_html_element(): void
    {
        $form = Form::make();

        $form = $form->addChild(
            Input::make()->type('hidden')->name('_token')->value('12345')
        );

        static::assertCount(1, $form->getChildren());

        $form = $form->addChild(
            Input::make()->type('hidden')->name('_method')->value('PUT')
        );

        static::assertCount(2, $form->getChildren());

        static::assertHtmlStringEqualsHtmlString(
            '<form><input name="_token" type="hidden" value="12345"/><input name="_method" type="hidden" value="PUT"/></form>',
            $form->toHtml()
        );
        static::assertHtmlStringEqualsHtmlString(
            '<form><input name="_token" type="hidden" value="12345"/><input name="_method" type="hidden" value="PUT"/>',
            $form->open()->toHtml()
        );
    }

    /** @test */
    public function it_can_add_multiple_children_type_html_string(): void
    {
        $form = Form::make();

        $form = $form->addChild(
            Input::make()->type('hidden')->name('_token')->value('12345')->render()
        );

        static::assertCount(1, $form->getChildren());

        $form = $form->addChild(
            Input::make()->type('hidden')->name('_method')->value('PUT')->render()
        );

        static::assertCount(2, $form->getChildren());

        static::assertHtmlStringEqualsHtmlString(
            '<form><input name="_token" type="hidden" value="12345"/><input name="_method" type="hidden" value="PUT"/></form>',
            $form->toHtml()
        );
        static::assertHtmlStringEqualsHtmlString(
            '<form><input name="_token" type="hidden" value="12345"/><input name="_method" type="hidden" value="PUT"/>',
            $form->open()->toHtml()
        );
    }

    /** @test */
    public function it_can_create_a_form_with_a_target(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form target="_blank"></form>',
            Form::make()->target('_blank')
        );
    }
}
