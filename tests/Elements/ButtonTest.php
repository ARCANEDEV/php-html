<?php namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Button;
use Arcanedev\Html\Elements\I;

/**
 * Class     ButtonTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ButtonTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button></button>',
            Button::make()
        );
    }

    /** @test */
    public function it_can_create_with_custom_type_and_value()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button type="submit" value="btn_value">Submit</button>',
            Button::make()->text('Submit')->type('submit')->value('btn_value')
        );
    }

    /** @test */
    public function it_can_create_with_content()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button>Hi</button>',
            Button::make()->text('Hi')
        );
    }

    /** @test */
    public function it_can_create_with_html_content()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button><em>Hi</em></button>',
            Button::make()->html('<em>Hi</em>')
        );
    }

    /** @test */
    public function it_can_create_with_html_element_object()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button><i class="fa fa-plus"></i></button>',
            Button::make()->html(
                I::make()->class(['fa', 'fa-plus'])
            )
        );
    }

    /** @test */
    public function it_can_create_with_a_specific_type()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button type="submit">Hi</button>',
            Button::make()->type('submit')->html('Hi')
        );
    }
}
