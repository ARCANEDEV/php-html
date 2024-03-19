<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Fieldset;
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
    public function it_can_create(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<fieldset></fieldset>',
            Fieldset::make()
        );
    }

    #[Test]
    public function it_can_add_a_legend_to_the_fieldset(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<fieldset><legend>Legend</legend></fieldset>',
            Fieldset::make()->legend('Legend')
        );
    }

    #[Test]
    public function it_can_disable_a_fieldset(): void
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<fieldset disabled></fieldset>',
            Fieldset::make()->disabled()
        );
    }
}
