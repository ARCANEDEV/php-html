<?php namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Select;

/**
 * Class     SelectTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class SelectTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_render_a_select_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<select></select>',
            Select::make()
        );
    }

    /** @test */
    public function it_can_render_a_select_element_required()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<select required></select>',
            Select::make()->required()
        );
    }

    /** @test */
    public function it_can_render_options()
    {
        $options = [
            'value1' => 'text1',
            'value2' => 'text2',
        ];

        static::assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="value1">text1</option>
                <option value="value2">text2</option>
            </select>',
            Select::make()->options($options)
        );
    }

    /** @test */
    public function it_can_have_a_value()
    {
        $options = [
            'value1' => 'text1',
            'value2' => 'text2',
        ];

        static::assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="value1">text1</option>
                <option selected value="value2">text2</option>
            </select>',
            Select::make()->options($options)->value('value2')
        );

        static::assertHtmlStringEqualsHtmlString(
            '<select name="avc">'.
                '<option value="null">Select an option</option>'.
                '<option value="1" selected>Yes</option>'.
                '<option value="0">No</option>'.
            '</select>',
            Select::make()
                  ->name('avc')
                  ->options(['null' => 'Select an option', 1 => 'Yes', 0 => 'No'])
                  ->value(1)
        );
    }

    /** @test */
    public function it_can_have_a_placeholder_option()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="" selected="selected">Placeholder</option>
                <option value="value1">text1</option>
                <option value="value2">text2</option>
            </select>',
            Select::make()
                  ->options(['value1' => 'text1', 'value2' => 'text2'])
                  ->placeholder('Placeholder')
        );

        static::assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="0" selected="selected">Placeholder</option>
                <option value="value1">text1</option>
                <option value="value2">text2</option>
            </select>',
            Select::make()
                  ->options(['value1' => 'text1', 'value2' => 'text2'])
                  ->placeholder('Placeholder', 0)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="0" selected="selected" disabled="disabled">Placeholder</option>
                <option value="value1">text1</option>
                <option value="value2">text2</option>
            </select>',
            Select::make()
                  ->options(['value1' => 'text1', 'value2' => 'text2'])
                  ->placeholder('Placeholder', 0, true)
        );
    }

    /** @test */
    public function it_doesnt_select_the_placeholder_if_something_has_already_been_selected()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="0">Placeholder</option>
                <option value="value1" selected="selected">text1</option>
                <option value="value2">text2</option>
            </select>',
            Select::make()
                  ->options(['value1' => 'text1', 'value2' => 'text2'])
                  ->value('value1')
                  ->placeholder('Placeholder', 0)
        );
    }

    /** @test */
    public function it_can_have_a_multiple_option()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<select multiple="multiple">
                <option value="value1">text1</option>
                <option value="value2">text2</option>
                <option value="value3">text3</option>
            </select>',
            Select::make()
                  ->options(['value1' => 'text1', 'value2' => 'text2', 'value3' => 'text3'])
                  ->multiple()
        );
    }

    /** @test */
    public function it_can_convert_multiple_select_name()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<select multiple="multiple" name="foo[]">
                <option value="value1">text1</option>
                <option value="value2">text2</option>
                <option value="value3">text3</option>
            </select>',
            Select::make()
                  ->name('foo')
                  ->options(['value1' => 'text1', 'value2' => 'text2', 'value3' => 'text3'])
                  ->multiple()
        );
    }

    /** @test */
    public function it_can_have_multiple_values()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<select multiple="multiple">
                <option value="value1" selected="selected">text1</option>
                <option value="value2">text2</option>
                <option value="value3" selected="selected">text3</option>
            </select>',
            Select::make()
                  ->options(['value1' => 'text1', 'value2' => 'text2', 'value3' => 'text3'])
                  ->value(['value1', 'value3'])
                  ->multiple()
        );
    }

    /** @test */
    public function it_can_have_one_multiple_value()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<select multiple="multiple">
                <option value="value1">text1</option>
                <option value="value2">text2</option>
                <option value="value3" selected="selected">text3</option>
            </select>',
            Select::make()
                  ->options(['value1' => 'text1', 'value2' => 'text2', 'value3' => 'text3'])
                  ->value('value3')
                  ->multiple()
        );
    }

    /** @test */
    public function it_can_have_an_optgroup()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<select>
                <optgroup label="Cats">
                    <option value="leopard">Leopard</option>
                </optgroup>
                <optgroup label="Dogs">
                    <option value="spaniel">Spaniel</option>
                </optgroup>
            </select>',
            Select::make()
                  ->options(['Cats' => ['leopard' => 'Leopard'], 'Dogs' => ['spaniel' => 'Spaniel']])
        );
    }

    /** @test */
    public function it_can_select_an_item_in_an_optgroup()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<select>
                <optgroup label="Cats">
                    <option value="leopard" selected="selected">Leopard</option>
                </optgroup>
                <optgroup label="Dogs">
                    <option value="spaniel">Spaniel</option>
                </optgroup>
            </select>',
            Select::make()
                  ->options(['Cats' => ['leopard' => 'Leopard'], 'Dogs' => ['spaniel' => 'Spaniel']])
                  ->value('leopard')
        );
    }

    /** @test */
    public function it_can_apply_options_with_custom_attributes()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="leopard" disabled="disabled">Leopard</option>
                <option value="spaniel" selected="selected">Spaniel</option>
            </select>',
            Select::make()
                ->options(
                    ['leopard' => 'Leopard', 'spaniel' => 'Spaniel'],
                    ['leopard' => ['disabled']]
                )
                ->value('spaniel')
        );
    }

    /** @test */
    public function it_can_select_an_item_in_an_optgroup_with_custom_attributes()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<select>
                <optgroup label="Cats">
                    <option value="leopard" disabled="disabled">Leopard</option>
                </optgroup>
                <optgroup label="Dogs">
                    <option value="spaniel" selected="selected">Spaniel</option>
                </optgroup>
            </select>',
            Select::make()
                ->options(
                    ['Cats' => ['leopard' => 'Leopard'], 'Dogs' => ['spaniel' => 'Spaniel']],
                    ['leopard' => ['disabled']]
                )
                ->value('spaniel')
        );

        static::assertHtmlStringEqualsHtmlString(
            '<select>
                <optgroup label="Cats">
                    <option value="leopard" disabled="disabled">Leopard</option>
                </optgroup>
                <optgroup label="Dogs">
                    <option value="spaniel" selected="selected">Spaniel</option>
                </optgroup>
                <optgroup label="Others" disabled></optgroup>
            </select>',
            Select::make()
                ->options(
                    ['Cats' => ['leopard' => 'Leopard'], 'Dogs' => ['spaniel' => 'Spaniel'], 'Others' => []],
                    ['leopard' => ['disabled']],
                    ['Others' => ['disabled']]
                )
                ->value('spaniel')
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
            Select::make()
                ->name('select')
                ->id('select')
                ->options($options)
                ->value('+2')
        );
    }
}
