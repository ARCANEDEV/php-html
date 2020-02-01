<?php

declare(strict_types=1);

namespace Arcanedev\Html;

use Arcanedev\Html\Contracts\Html as HtmlContract;
use Arcanedev\Html\Elements\{
    A, Button, Div, Dl, Element, Fieldset, File, Form, I, Img, Input, Label, Legend, Option, Select, Span, Textarea, Ul
};
use Arcanedev\Html\Entities\Attributes\ClassAttribute;
use DateTimeImmutable;
use Illuminate\Support\Str;

/**
 * Class     Html
 *
 * @package  Arcanedev\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Html implements HtmlContract
{
    /* -----------------------------------------------------------------
     |  Constants
     | -----------------------------------------------------------------
     */

    const HTML_DATE_FORMAT = 'Y-m-d';
    const HTML_TIME_FORMAT = 'H:i:s';

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
                ->attributeIfNotNull($href, 'href', $href)
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
                     ->attributeIfNotNull($type, 'type', $type)
                     ->html($content);
    }

    /**
     * Make a checkbox input.
     *
     * @param  string|null  $name
     * @param  bool|null    $checked
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function checkbox($name = null, $checked = null, $value = '1')
    {
        return Input::make()
                    ->attribute('type', 'checkbox')
                    ->attributeIfNotNull($name, 'name', $name)
                    ->attributeIfNotNull($name, 'id', $name)
                    ->attributeIfNotNull($value, 'value', $value)
                    ->attributeIf((bool) $checked, 'checked');
    }

    /**
     * Parse and render `class` attribute.
     *
     * @param  iterable|string  $classes
     *
     * @return string
     */
    public function class($classes): string
    {
        return ClassAttribute::make($classes)->render();
    }

    /**
     * Make a date input.
     *
     * @param  string|null  $name
     * @param  string|null  $value
     * @param  bool         $format
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function date($name = null, $value = null, bool $format = true)
    {
        $input = $this->input('date', $name, $value);

        if (
            $format
            && $input->hasAttribute('value')
            && ! empty($value = $input->getAttribute('value')->value())
        ) {
            $input = $input->value(static::formatDateTime($value, static::HTML_DATE_FORMAT));
        }

        return $input;
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
     * @param  string|null  $name
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function email($name = null, $value = null)
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
                   ->attributeIfNotNull($name, 'name', $name)
                   ->attributeIfNotNull($name, 'id', $name);
    }

    /**
     * Make a form input.
     *
     * @param  string       $method
     * @param  string|null  $action
     *
     * @return \Arcanedev\Html\Elements\Form
     */
    public function form($method = 'POST', $action = null)
    {
        return Form::make()
                   ->method($method)
                   ->attributeIfNotNull($action, 'action', $action);
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
        $hasValue = $name && ! is_null($value) && $type !== 'password';

        return Input::make()
                    ->attributeIfNotNull($type, 'type', $type)
                    ->attributeIfNotNull($name, 'name', $name)
                    ->attributeIfNotNull($name, 'id', $name)
                    ->attributeIf($hasValue, 'value', $value);
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
                  ->attributeIfNotNull($src, 'src', $src)
                  ->attributeIfNotNull($alt, 'alt', $alt);
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
                    ->attributeIfNotNull($for, 'for', $for)
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
     * @param  bool|null    $checked
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function radio($name = null, $checked = null, $value = null)
    {
        return $this->input('radio', $name, $value)
                    ->attributeIfNotNull($name, 'id', $value === null ? $name : ($name.'_'.Str::slug($value)))
                    ->attributeIf(( ! is_null($value)) || $checked, 'checked');
    }

    /**
     * Make a range input.
     *
     * @param  string|null  $name
     * @param  string|null  $value
     * @param  string|null  $min
     * @param  string|null  $max
     * @param  string|null  $step
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function range($name = null, $value = null, $min = null, $max = null, $step = null)
    {
        return $this->input('range', $name, $value)
                    ->attributeIfNotNull($min, 'min', $min)
                    ->attributeIfNotNull($max, 'max', $max)
                    ->attributeIfNotNull($step, 'step', $step);
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
                     ->attributeIfNotNull($name, 'name', $name)
                     ->attributeIfNotNull($name, 'id', $name)
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
                       ->attributeIfNotNull($name, 'name', $name)
                       ->attributeIfNotNull($name, 'id', $name)
                       ->value($value);
    }

    /**
     * Make a time input.
     *
     * @param  string|null  $name
     * @param  string|null  $value
     * @param  bool         $format
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function time($name = null, $value = null, $format = true)
    {
        $input = $this->input('time', $name, $value);

        return $format
            && $input->hasAttribute('value')
            && ! empty($value = $input->getAttribute('value')->value())
            ? $input->value(static::formatDateTime($value, self::HTML_TIME_FORMAT))
            : $input;
    }

    /**
     * Make a number input.
     *
     * @param  string|null  $name
     * @param  string|null  $value
     * @param  mixed|null   $min
     * @param  mixed|null   $max
     * @param  mixed|null   $step
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function number($name = null, $value = null, $min = null, $max = null, $step = null)
    {
        return $this->input('number', $name, $value)
                    ->attributeIfNotNull($min, 'min', $min)
                    ->attributeIfNotNull($max, 'max', $max)
                    ->attributeIfNotNull($step, 'step', $step);
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
        return Ul::make()->attributes($attributes);
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
        return Dl::make()->attributes($attributes);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Format the date/time value.
     *
     * @param  string  $value
     * @param  string  $format
     *
     * @return string
     */
    protected static function formatDateTime(string $value, string $format): string
    {
        try {
            return empty($value)
                ? $value
                : (new DateTimeImmutable($value))->format($format);
        }
        catch (\Exception $e) {
            return $value;
        }
    }
}
