<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use PHPUnit\Framework\Attributes\Test;

/**
 * Class     FileTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class FileTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_create_a_file_input(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="file">',
            $this->html->file()
        );
    }

    #[Test]
    public function it_can_create_a_file_input_with_a_name(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="archives" type="file" name="archives">',
            $this->html->file('archives')
        );
    }
}
