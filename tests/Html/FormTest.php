<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use PHPUnit\Framework\Attributes\Test;

/**
 * Class     FormTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class FormTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_create_a_form(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form method="POST"></form>',
            $this->html->form()
        );
    }

    #[Test]
    public function it_can_create_a_form_with_a_custom_action(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form method="POST" action="/submit"></form>',
            $this->html->form('POST', '/submit')
        );
    }

    #[Test]
    public function it_can_create_a_form_with_a_target(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form method="POST" action="/submit" target="_blank">'.
            '<input type="hidden" name="_token" value="abc">'.
            '</form>',
            $this->html
                ->form('POST', '/submit')
                ->target('_blank')
                ->addChild('<input type="hidden" name="_token" value="abc">')
        );
    }
}
