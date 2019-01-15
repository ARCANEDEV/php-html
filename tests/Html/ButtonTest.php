<?php namespace Arcanedev\Html\Tests\Html;

/**
 * Class     ButtonTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ButtonTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_button()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button></button>',
            $this->html->button()
        );
    }

    /** @test */
    public function it_can_create_a_button_with_contents()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button>Hi</button>',
            $this->html->button('Hi')
        );
    }

    /** @test */
    public function it_can_create_a_button_with_html_contents()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button><em>Hi</em></button>',
            $this->html->button('<em>Hi</em>')
        );
    }

    /** @test */
    public function it_can_create_a_button_with_a_type()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button type="submit">Hi</button>',
            $this->html->button('Hi', 'submit')
        );
    }
}
