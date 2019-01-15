<?php namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\A;

/**
 * Class     ATest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ATest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a></a>',
            A::make()
        );
    }

    /** @test */
    public function it_can_create_with_a_href()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="https://github.com"></a>',
            A::make()->href('https://github.com')
        );
    }

    /** @test */
    public function it_can_create_with_custom_data_attributes()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="#delete-user-modal" data-role="modal" data-id="1" data-name="User 1"></a>',
            A::make()->href('#delete-user-modal')->data(['role' => 'modal', 'id' => 1, 'name' => 'User 1'])
        );
    }
}
