<?php namespace Arcanedev\Html\Tests\Entities;

use Arcanedev\Html\Entities\Attributes\ClassAttribute;
use Arcanedev\Html\Tests\TestCase;

/**
 * Class     ClassAttributeTest
 *
 * @package  Arcanedev\Html\Tests\Entities
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ClassAttributeTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_be_instantiated()
    {
        static::assertSame([], ClassAttribute::make()->all());

        static::assertEquals(
            ['btn', 'btn-primary'],
            ClassAttribute::make('btn btn-primary')->all()
        );

        static::assertEquals(
            ['btn', 'btn-primary'],
            ClassAttribute::make(['btn', 'btn-primary'])->all()
        );

        static::assertEquals(
            ['btn', 'btn-primary'],
            ClassAttribute::make(collect(['btn', 'btn-primary']))->all()
        );
    }

    /** @test */
    public function it_can_add_classes()
    {
        $attribute = ClassAttribute::make();

        $attribute->add('btn');

        static::assertSame(['btn'], $attribute->all());

        $attribute->add('btn-primary');

        static::assertSame(['btn', 'btn-primary'], $attribute->all());

        // Make sure the classes are unique
        $attribute->add('btn-primary');

        static::assertSame(['btn', 'btn-primary'], $attribute->all());
    }

    /** @test */
    public function it_can_add_classes_conditionally_with_an_associative_array()
    {
        $attribute = new ClassAttribute([
            'foo' => true,
            'bar' => false,
            'baz',
        ]);

        static::assertEquals(['foo', 'baz'], $attribute->all());
    }

    /** @test */
    public function it_can_check_if_class_exists()
    {
        $attribute = ClassAttribute::make();

        $attribute->add('btn');

        static::assertTrue($attribute->has('btn'));
        static::assertTrue($attribute->contains('btn'));

        $attribute->add('btn-primary');

        static::assertTrue($attribute->has('btn'));
        static::assertTrue($attribute->has('btn-primary'));
        static::assertTrue($attribute->contains('btn'));
        static::assertTrue($attribute->contains('btn-primary'));

        static::assertFalse($attribute->has('btn-block'));
        static::assertFalse($attribute->contains('btn-block'));
    }

    /** @test */
    public function it_can_remove_classes()
    {
        $attribute = ClassAttribute::make('btn btn-primary');

        static::assertSame(['btn', 'btn-primary'], $attribute->all());

        $attribute->remove('btn-primary');

        static::assertSame(['btn'], $attribute->all());

        // Make sure nothing happens
        $attribute->remove('btn-primary');

        static::assertSame(['btn'], $attribute->all());
    }

    /** @test */
    public function it_can_can_toggle_classes()
    {
        $attribute = ClassAttribute::make('btn btn-primary');

        static::assertSame(['btn', 'btn-primary'], $attribute->all());

        $attribute->toggle('active');

        static::assertSame(['btn', 'btn-primary', 'active'], $attribute->all());

        $attribute->toggle('active');

        static::assertSame(['btn', 'btn-primary'], $attribute->all());
    }

    /** @test */
    public function it_can_replace_classes()
    {
        $attribute = ClassAttribute::make('btn btn-primary');

        static::assertSame(['btn', 'btn-primary'], $attribute->all());

        $attribute->replace('btn-primary', 'btn-success');

        static::assertSame(['btn', 'btn-success'], $attribute->all());

        // Make sure nothing happens
        $attribute->replace('btn-primary', 'btn-success');

        static::assertSame(['btn', 'btn-success'], $attribute->all());
    }

    /** @test */
    public function it_can_check_classes_is_empty_or_not()
    {
        $attribute = ClassAttribute::make();

        static::assertTrue($attribute->isEmpty());
        static::assertFalse($attribute->isNotEmpty());

        $attribute->add('btn');

        static::assertFalse($attribute->isEmpty());
        static::assertTrue($attribute->isNotEmpty());

        $attribute->remove('btn');

        static::assertTrue($attribute->isEmpty());
        static::assertFalse($attribute->isNotEmpty());
    }

    /** @test */
    public function it_can_count_classes()
    {
        $attribute = new ClassAttribute;

        static::assertEmpty($attribute);
        static::assertCount(0, $attribute);
        static::assertSame(0, $attribute->count());

        $attribute = ClassAttribute::make('btn btn-primary');

        static::assertNotEmpty($attribute);
        static::assertCount(2, $attribute);
        static::assertSame(2, $attribute->count());
    }

    /** @test */
    public function it_can_render()
    {
        static::assertSame('', ClassAttribute::make()->render());

        $attribute = ClassAttribute::make(['btn', 'btn-primary']);

        static::assertSame('class="btn btn-primary"', $attribute->render());
        static::assertSame('class="btn btn-primary"', (string) $attribute);
    }
}
