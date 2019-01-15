<?php namespace Arcanedev\Html\Tests\Html;

/**
 * Class     ClassTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ClassTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_render_a_class_attribute_with_classes_based_on_conditions()
    {
        $classes = [
            'foo' => true,
            'bar' => false,
            'baz',
        ];

        static::assertEquals('class="foo baz"', $this->html->class($classes));
    }

    /** @test */
    public function it_can_render_a_class_attribute_from_a_string()
    {
        static::assertEquals('class="foo"', $this->html->class('foo'));
        static::assertEquals('class="foo"', $this->html->class('foo foo'));
    }

    /** @test */
    public function it_can_render_a_class_attribute_from_a_collection()
    {
        $classes = collect([
            'foo' => true,
            'bar' => false,
        ]);

        static::assertEquals('class="foo"', $this->html->class($classes));
    }
}
