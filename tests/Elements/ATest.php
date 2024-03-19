<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\A;
use PHPUnit\Framework\Attributes\Test;

/**
 * Class     ATest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ATest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_create(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a></a>',
            A::make()->toHtml()
        );
    }

    #[Test]
    public function it_can_create_with_a_href(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="https://github.com"></a>',
            A::make()->href('https://github.com')
        );
    }

    #[Test]
    public function it_can_create_with_custom_data_attributes(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="#delete-user-modal" data-role="modal" data-id="1" data-name="User 1"></a>',
            A::make()->href('#delete-user-modal')->data(['role' => 'modal', 'id' => 1, 'name' => 'User 1'])
        );
    }

    #[Test]
    public function it_can_create_an_a_element_with_a_target(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a target="_blank"></a>',
            A::make()->target('_blank')
        );
    }
}
