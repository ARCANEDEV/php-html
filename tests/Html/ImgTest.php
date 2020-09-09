<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

/**
 * Class     ImgTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ImgTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_img_tag_with_image_source_and_alt(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<img src="/path/to/image/file" alt="alt_value">',
            $this->html->img('/path/to/image/file', 'alt_value')
        );
    }
}
