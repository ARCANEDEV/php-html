<?php namespace Arcanedev\Html\Tests\Html;

/**
 * Class     SelectTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class SelectTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_render_a_select_element()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<select></select>',
            $this->html->select()
        );
    }

    /** @test */
    public function it_can_render_a_select_element_required()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<select required></select>',
            $this->html->select()->required()
        );
    }

    /** @test */
    public function it_can_render_a_select_element_with_options()
    {
        $options = [
            'value1' => 'text1',
            'value2' => 'text2',
        ];

        static::assertHtmlStringEqualsHtmlString(
            '<select name="select" id="select">
                <option value="value1">text1</option>
                <option value="value2">text2</option>
            </select>',
            $this->html->select('select', $options)
        );
    }

    /** @test */
    public function it_can_render_a_select_element_with_options_with_a_selected_value()
    {
        $options = [
            'value1' => 'text1',
            'value2' => 'text2',
        ];

        static::assertHtmlStringEqualsHtmlString(
            '<select name="select" id="select">
                <option value="value1" selected="selected">text1</option>
                <option value="value2">text2</option>
            </select>',
            $this->html->select('select', $options, 'value1')
        );
    }

    /** @test */
    public function it_can_render_a_select_element_with_options_with_a_selected_value_when_the_values_are_similar()
    {
        $options = [
            '0'  => '0',
            '2'  => '2',
            '+2' => '+2',
        ];

        static::assertHtmlStringEqualsHtmlString(
            '<select name="select" id="select">
                <option value="0">0</option>
                <option selected="selected" value="2">2</option>
                <option value="+2" selected="selected">+2</option>
            </select>',
            $this->html->select('select', $options, '+2')
        );
    }

    /** @test */
    public function it_can_create_a_select_with_multiple_attribute()
    {
        $options = [
            'value1' => 'text1',
            'value2' => 'text2',
            'value3' => 'text3',
        ];

        static::assertHtmlStringEqualsHtmlString(
            '<select id="select" name="select[]" multiple="multiple">
                <option value="value1" selected>text1</option>
                <option value="value2" selected>text2</option>
                <option value="value3">text3</option>
            </select>',
            $this->html->select('select', $options, ['value1', 'value2'])->multiple()
        );
    }
}
