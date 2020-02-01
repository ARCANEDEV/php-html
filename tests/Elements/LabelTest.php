<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Label;

/**
 * Class     LabelTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LabelTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label></label>',
            Label::make()
        );
    }

    /** @test */
    public function it_can_create_with_a_custom_for_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label for="some_input_id"></label>',
            Label::make()->for('some_input_id')
        );
    }
}
