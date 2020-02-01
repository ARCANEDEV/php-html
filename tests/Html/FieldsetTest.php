<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

/**
 * Class     FieldsetTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class FieldsetTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_fieldset(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<fieldset></fieldset>',
            $this->html->fieldset()
        );
    }

    /** @test */
    public function it_can_create_a_fieldset_with_a_legend(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<fieldset><legend>Legend</legend></fieldset>',
            $this->html->fieldset('Legend')
        );
    }

    /** @test */
    public function it_can_add_a_legend_to_the_fieldset(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<fieldset><legend>Legend</legend></fieldset>',
            $this->html->fieldset()->legend('Legend')
        );
    }
}
