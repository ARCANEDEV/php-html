<?php namespace Arcanedev\Html;

use Arcanedev\Html\Contracts\Html as HtmlContract;
use Arcanedev\Html\Elements\{A,
    Button,
    Div,
    Element,
    Fieldset,
    File,
    Form,
    I,
    Img,
    Input,
    Label,
    Legend,
    Option,
    Select,
    Span,
    Textarea};
use Arcanedev\Html\Entities\Attributes\ClassAttribute;

/**
 * Class     Html
 *
 * @package  Arcanedev\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Html implements HtmlContract
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Make an `a` tag.
     *
     * @param  string|null  $href
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\A
     */
    public function a($href = null, $value = null)
    {
        return A::make()
                ->attributeIf( ! is_null($href), 'href', $href)
                ->html($value);
    }

    /**
     * Make a `button` tag.
     *
     * @param  string|null  $content
     * @param  string|null  $type
     *
     * @return \Arcanedev\Html\Elements\Button
     */
    public function button($content = null, $type = null)
    {
        return Button::make()
                     ->attributeIf($type, 'type', $type)
                     ->html($content);
    }

    /**
     * Make a checkbox input.
     *
     * @param  string|null  $name
     * @param  bool         $checked
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function checkbox($name = null, $checked = false, $value = '1')
    {
        return Input::make()
                    ->attribute('type', 'checkbox')
                    ->attributeIf($name, 'name', $name)
                    ->attributeIf($name, 'id', $name)
                    ->attributeIf(! is_null($value), 'value', $value)
                    ->attributeIf((bool) $checked, 'checked');
    }

    /**
     * Parse and render `class` attribute.
     *
     * @param  iterable|string  $classes
     *
     * @return string
     */
    public function class($classes)
    {
        return ClassAttribute::make($classes)->render();
    }

    /**
     * Make a date input.
     *
     * @param  string|null  $name
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function date($name = '', $value = '')
    {
        return $this->input('date', $name, $value);
    }

    /**
     * Make a div element.
     *
     * @param  \Arcanedev\Html\Elements\HtmlElement|string|null  $content
     *
     * @return \Arcanedev\Html\Elements\Div
     */
    public function div($content = null)
    {
        return Div::make()->addChild($content);
    }

    /**
     * Make a custom tag element.
     *
     * @param  string  $tag
     *
     * @return \Arcanedev\Html\Elements\Element
     */
    public function element($tag)
    {
        return Element::withTag($tag);
    }

    /**
     * Make an email input.
     *
     * @param  string       $name
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function email($name, $value = null)
    {
        return $this->input('email', $name, $value);
    }

    /**
     * Make a fieldset tag.
     *
     * @param  \Arcanedev\Html\Elements\HtmlElement|string|null  $legend
     *
     * @return \Arcanedev\Html\Elements\Fieldset
     */
    public function fieldset($legend = null)
    {
        return is_null($legend)
            ? Fieldset::make()
            : Fieldset::make()->legend($legend);
    }

    /**
     * Make a file input.
     *
     * @param  string|null  $name
     *
     * @return \Arcanedev\Html\Elements\File
     */
    public function file($name = null)
    {
        return File::make()
                   ->attributeIf($name, 'name', $name)
                   ->attributeIf($name, 'id', $name);
    }

    /**
     * @param  string       $method
     * @param  string|null  $action
     *
     * @return \Arcanedev\Html\Elements\Form
     */
    public function form($method = 'POST', $action = null)
    {
        return Form::make()
                   ->method($method)
                   ->attributeIf($action, 'action', $action);
    }

    /**
     * Make a hidden input.
     *
     * @param  string|null  $name
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function hidden($name = null, $value = null)
    {
        return $this->input('hidden', $name, $value);
    }

    /**
     * Make an i tag.
     *
     * @param  string|null  $content
     *
     * @return \Arcanedev\Html\Elements\I
     */
    public function i($content = null)
    {
        return I::make()->html($content);
    }

    /**
     * Make an input tag.
     *
     * @param  string|null  $type
     * @param  string|null  $name
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function input($type = null, $name = null, $value = null)
    {
        return Input::make()
                    ->attributeIf($type, 'type', $type)
                    ->attributeIf($name, 'name', $name)
                    ->attributeIf($name, 'id', $name)
                    ->attributeIf($name && ! is_null($value), 'value', $value);
    }

    /**
     * Make an image tag.
     *
     * @param  string|null  $src
     * @param  string|null  $alt
     *
     * @return \Arcanedev\Html\Elements\Img
     */
    public function img($src = null, $alt = null)
    {
        return Img::make()
                  ->attributeIf($src, 'src', $src)
                  ->attributeIf($alt, 'alt', $alt);
    }

    /**
     * Make a label tag.
     *
     * @param  \Arcanedev\Html\Elements\HtmlElement|iterable|string|null  $content
     * @param  string|null                                                $for
     *
     * @return \Arcanedev\Html\Elements\Label
     */
    public function label($content = null, $for = null)
    {
        return Label::make()
                    ->attributeIf($for, 'for', $for)
                    ->children($content);
    }

    /**
     * Make a legend tag.
     *
     * @param  \Arcanedev\Html\Elements\HtmlElement|string|null  $content
     *
     * @return \Arcanedev\Html\Elements\Legend
     */
    public function legend($content = null)
    {
        return Legend::make()->html($content);
    }

    /**
     * Make a mailto link.
     *
     * @param  string       $email
     * @param  string|null  $content
     *
     * @return \Arcanedev\Html\Elements\A
     */
    public function mailto($email, $content = null)
    {
        return $this->a("mailto:{$email}", $content ?: $email);
    }

    /**
     * Make an option tag.
     *
     * @param  string|null  $text
     * @param  string|null  $value
     * @param  bool         $selected
     *
     * @return \Arcanedev\Html\Elements\Option
     */
    public function option($text = null, $value = null, $selected = false)
    {
        return Option::make()
                     ->text($text)
                     ->value($value)
                     ->selectedIf($selected);
    }

    /**
     * Make a password input.
     *
     * @param  string|null  $name
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function password($name = null)
    {
        return $this->input('password', $name);
    }

    /**
     * Make a radio input.
     *
     * @param  string|null  $name
     * @param  bool         $checked
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function radio($name = null, $checked = false, $value = null)
    {
        return $this->input('radio', $name, $value)
                    ->attributeIf($name, 'id', $value === null ? $name : ($name.'_'.str_slug($value)))
                    ->attributeIf(( ! is_null($value)) || $checked, 'checked');
    }

    /**
     * Make a reset button.
     *
     * @param  string|null  $text
     *
     * @return \Arcanedev\Html\Elements\Button
     */
    public function reset($text = null)
    {
        return $this->button($text, 'reset');
    }

    /**
     * Make a select tag.
     *
     * @param  string|null           $name
     * @param  array|iterable        $options
     * @param  string|iterable|null  $value
     *
     * @return \Arcanedev\Html\Elements\Select
     */
    public function select($name = null, $options = [], $value = null)
    {
        return Select::make()
                     ->attributeIf($name, 'name', $name)
                     ->attributeIf($name, 'id', $name)
                     ->options($options)
                     ->value($value);
    }

    /**
     * Make a span tag.
     *
     * @param  \Arcanedev\Html\Elements\HtmlElement|string|null  $content
     *
     * @return \Arcanedev\Html\Elements\Span
     */
    public function span($content = null)
    {
        return Span::make()->children($content);
    }

    /**
     * Make a submit button.
     *
     * @param  string|null  $text
     *
     * @return \Arcanedev\Html\Elements\Button
     */
    public function submit($text = null)
    {
        return $this->button($text, 'submit');
    }

    /**
     * Make a tel link.
     *
     * @param  string       $phoneNumber
     * @param  string|null  $text
     *
     * @return \Arcanedev\Html\Elements\A
     */
    public function telLink($phoneNumber, $text = null)
    {
        return $this->a("tel:{$phoneNumber}", $text ?: $phoneNumber);
    }

    /**
     * Make a text input.
     *
     * @param  string       $name
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function text($name, $value = null)
    {
        return $this->input('text', $name, $value);
    }

    /**
     * Make a textarea tag.
     *
     * @param  string|null  $name
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Textarea
     */
    public function textarea($name = null, $value = null)
    {
        return Textarea::make()
                       ->attributeIf($name, 'name', $name)
                       ->attributeIf($name, 'id', $name)
                       ->value($value);
    }

    /**
     * Make a time input.
     *
     * @param  string|null  $name
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function time($name = null, $value = null)
    {
        return $this->input('time', $name, $value);
    }

    /**
     * Make a number input.
     *
     * @param  string       $name
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function number($name, $value = null)
    {
        return $this->input('number', $name, $value);
    }

    /**
     * Make an ordered list.
     *
     * @param  array  $attributes
     *
     * @return \Arcanedev\Html\Elements\Ol
     */
    public function ol(array $attributes = [])
    {
        return Elements\Ol::make()->attributes($attributes);
    }

    /**
     * Make an unordered list.
     *
     * @param  array  $attributes
     *
     * @return \Arcanedev\Html\Elements\Ul
     */
    public function ul(array $attributes = [])
    {
        return Elements\Ul::make()->attributes($attributes);
    }

    /**
     * Make a description list.
     *
     * @param  array  $attributes
     *
     * @return \Arcanedev\Html\Elements\Dl
     */
    public function dl(array $attributes = [])
    {
        return Elements\Dl::make()->attributes($attributes);
    }
}
