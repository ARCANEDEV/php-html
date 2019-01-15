<?php namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Form;
use Arcanedev\Html\Elements\Input;

/**
 * Class     FormTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class FormTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form></form>',
            Form::make()
        );
    }

    /** @test */
    public function it_can_split_form_tags()
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
    public function it_can_create_with_a_custom_action()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form action="/submit"></form>',
            Form::make()->action('/submit')
        );
    }

    /** @test */
    public function it_can_create_with_a_custom_method()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form method="POST"></form>',
            Form::make()->method('POST')
        );
    }

    /** @test */
    public function it_can_create_with_accepts_files()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form enctype="multipart/form-data"></form>',
            Form::make()->acceptsFiles()
        );
    }

    /** @test */
    public function it_can_create_with_html_builder()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form method="POST" action="/submit"></form>',
            Form::make()->action('/submit')->method('DELETE')
        );
    }

    /** @test */
    public function it_can_create_a_form_that_add_novalidate_attribute()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form enctype="multipart/form-data" novalidate=""></form>',
            Form::make()->novalidate()->acceptsFiles()
        );
    }

    /** @test */
    public function it_can_add_multiple_children_type_html_element()
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
    public function it_can_add_multiple_children_type_html_string()
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
}
