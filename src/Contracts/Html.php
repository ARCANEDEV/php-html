<?php namespace Arcanedev\Html\Contracts;

/**
 * Interface     Html
 *
 * @package  Arcanedev\Html\Contracts
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface Html
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Make an `a` tag.
     *
     * @param  string|null  $href
     * @param  string|null  $content
     *
     * @return \Arcanedev\Html\Elements\A
     */
    public function a($href = null, $content = null);

    /**
     * Make a `button` tag.
     *
     * @param  string|null  $content
     * @param  string|null  $type
     *
     * @return \Arcanedev\Html\Elements\Button
     */
    public function button($content = null, $type = null);

    /**
     * Make a checkbox input.
     *
     * @param  string|null  $name
     * @param  bool|null    $checked
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function checkbox($name = null, $checked = null, $value = '1');

    /**
     * Parse and render `class` attribute.
     *
     * @param  iterable|string  $classes
     *
     * @return string
     */
    public function class($classes);

    /**
     * Make a date input.
     *
     * @param  string|null  $name
     * @param  string|null  $value
     * @param  bool         $format
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function date($name = null, $value = null, bool $format = true);

    /**
     * Make a div element.
     *
     * @param  \Arcanedev\Html\Elements\HtmlElement|string|null  $content
     *
     * @return \Arcanedev\Html\Elements\Div
     */
    public function div($content = null);

    /**
     * Make a custom tag element.
     *
     * @param  string  $tag
     *
     * @return \Arcanedev\Html\Elements\Element
     */
    public function element($tag);

    /**
     * Make an email input.
     *
     * @param  string       $name
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function email($name = null, $value = null);

    /**
     * Make a fieldset tag.
     *
     * @param  \Arcanedev\Html\Elements\HtmlElement|string|null  $legend
     *
     * @return \Arcanedev\Html\Elements\Fieldset
     */
    public function fieldset($legend = null);

    /**
     * Make a file input.
     *
     * @param  string|null  $name
     *
     * @return \Arcanedev\Html\Elements\File
     */
    public function file($name = null);

    /**
     * Make a form tag.
     *
     * @param  string       $method
     * @param  string|null  $action
     *
     * @return \Arcanedev\Html\Elements\Form
     */
    public function form($method = 'POST', $action = null);

    /**
     * Make a hidden input.
     *
     * @param  string|null  $name
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function hidden($name = null, $value = null);

    /**
     * Make an i tag.
     *
     * @param  string|null  $content
     *
     * @return \Arcanedev\Html\Elements\I
     */
    public function i($content = null);

    /**
     * Make an input tag.
     *
     * @param  string|null  $type
     * @param  string|null  $name
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function input($type = null, $name = null, $value = null);

    /**
     * Make an image tag.
     *
     * @param  string|null  $src
     * @param  string|null  $alt
     *
     * @return \Arcanedev\Html\Elements\Img
     */
    public function img($src = null, $alt = null);

    /**
     * Make a label tag.
     *
     * @param  \Arcanedev\Html\Elements\HtmlElement|iterable|string|null  $content
     * @param  string|null                                                $for
     *
     * @return \Arcanedev\Html\Elements\Label
     */
    public function label($content = null, $for = null);

    /**
     * Make a legend tag.
     *
     * @param  \Arcanedev\Html\Elements\HtmlElement|string|null  $content
     *
     * @return \Arcanedev\Html\Elements\Legend
     */
    public function legend($content = null);

    /**
     * Make a mailto link.
     *
     * @param  string       $email
     * @param  string|null  $content
     *
     * @return \Arcanedev\Html\Elements\A
     */
    public function mailto($email, $content = null);

    /**
     * Make an option tag.
     *
     * @param  string|null  $text
     * @param  string|null  $value
     * @param  bool         $selected
     *
     * @return \Arcanedev\Html\Elements\Option
     */
    public function option($text = null, $value = null, $selected = false);

    /**
     * Make a password input.
     *
     * @param  string|null  $name
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function password($name = null);

    /**
     * Make a radio input.
     *
     * @param  string|null  $name
     * @param  bool|null    $checked
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function radio($name = null, $checked = null, $value = null);

    /**
     * Make a reset button.
     *
     * @param  string|null  $text
     *
     * @return \Arcanedev\Html\Elements\Button
     */
    public function reset($text = null);

    /**
     * Make a select tag.
     *
     * @param  string|null           $name
     * @param  array|iterable        $options
     * @param  string|iterable|null  $value
     *
     * @return \Arcanedev\Html\Elements\Select
     */
    public function select($name = null, $options = [], $value = null);

    /**
     * Make a span tag.
     *
     * @param  \Arcanedev\Html\Elements\HtmlElement|string|null  $content
     *
     * @return \Arcanedev\Html\Elements\Span
     */
    public function span($content = null);

    /**
     * Make a submit button.
     *
     * @param  string|null  $text
     *
     * @return \Arcanedev\Html\Elements\Button
     */
    public function submit($text = null);

    /**
     * Make a tel link.
     *
     * @param  string       $phoneNumber
     * @param  string|null  $text
     *
     * @return \Arcanedev\Html\Elements\A
     */
    public function telLink($phoneNumber, $text = null);

    /**
     * Make a text input.
     *
     * @param  string       $name
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function text($name, $value = null);

    /**
     * Make a textarea tag.
     *
     * @param  string|null  $name
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Textarea
     */
    public function textarea($name = null, $value = null);

    /**
     * Make a time input.
     *
     * @param  string|null  $name
     * @param  string|null  $value
     * @param  bool         $format
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function time($name = null, $value = null, $format = true);

    /**
     * Make a number input.
     *
     * @param  string       $name
     * @param  string|null  $value
     *
     * @return \Arcanedev\Html\Elements\Input
     */
    public function number($name, $value = null);
}
