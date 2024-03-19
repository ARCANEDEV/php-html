<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use PHPUnit\Framework\Attributes\Test;

/**
 * Class     FieldsetTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class FieldsetTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_create_a_fieldset(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<fieldset></fieldset>',
            $this->html->fieldset()
        );
    }

    #[Test]
    public function it_can_create_a_fieldset_with_a_legend(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<fieldset><legend>Legend</legend></fieldset>',
            $this->html->fieldset('Legend')
        );
    }

    #[Test]
    public function it_can_add_a_legend_to_the_fieldset(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<fieldset><legend>Legend</legend></fieldset>',
            $this->html->fieldset()->legend('Legend')
        );
    }
}
