<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\{Button, I};

/**
 * Class     ButtonTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ButtonTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button></button>',
            Button::make()
        );
    }

    /** @test */
    public function it_can_create_with_custom_type_and_value(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button type="submit" value="btn_value">Submit</button>',
            Button::make()->text('Submit')->type('submit')->value('btn_value')
        );
    }

    /** @test */
    public function it_can_create_with_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button>Hi</button>',
            Button::make()->text('Hi')
        );
    }

    /** @test */
    public function it_can_create_with_html_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button><em>Hi</em></button>',
            Button::make()->html('<em>Hi</em>')
        );
    }

    /** @test */
    public function it_can_create_with_html_element_object(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button><i class="fa fa-plus"></i></button>',
            Button::make()->html(
                I::make()->class(['fa', 'fa-plus'])
            )
        );
    }

    /** @test */
    public function it_can_create_with_a_specific_type(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button type="submit">Hi</button>',
            Button::make()->type('submit')->html('Hi')
        );

        static::assertHtmlStringEqualsHtmlString(
            '<button type="submit">Hi</button>',
            Button::make()->submit()->html('Hi')
        );

        static::assertHtmlStringEqualsHtmlString(
            '<button type="reset">Reset the form</button>',
            Button::make()->reset()->html('Reset the form')
        );
    }
}
