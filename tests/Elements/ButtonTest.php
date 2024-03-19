<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\{Button, I};
use PHPUnit\Framework\Attributes\Test;

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

    #[Test]
    public function it_can_create(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button></button>',
            Button::make()
        );
    }

    #[Test]
    public function it_can_create_a_button_with_a_value(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button value="1"></button>',
            Button::make()->value(1)
        );
    }

    #[Test]
    public function it_can_create_with_custom_type_and_value(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button type="submit" value="btn_value">Submit</button>',
            Button::make()->text('Submit')->type('submit')->value('btn_value')
        );
    }

    #[Test]
    public function it_can_create_with_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button>Hi</button>',
            Button::make()->text('Hi')
        );
    }

    #[Test]
    public function it_can_create_with_html_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button><em>Hi</em></button>',
            Button::make()->html('<em>Hi</em>')
        );
    }

    #[Test]
    public function it_can_create_with_html_element_object(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button><i class="fa fa-plus"></i></button>',
            Button::make()->html(
                I::make()->class(['fa', 'fa-plus'])
            )
        );
    }

    #[Test]
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

    #[Test]
    public function it_can_disable_a_button(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button disabled></button>',
            Button::make()->disabled()
        );
    }
}
