<?php namespace Arcanedev\Html\Elements;

use Arcanedev\Html\Contracts\Selectable;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * Class     Select
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Select extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var string */
    protected $tag = 'select';

    /** @var array */
    protected $options = [];

    /** @var string|iterable */
    protected $value = '';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * @return static
     */
    public function multiple()
    {
        $element = clone $this;
        $element = $element->attribute('multiple');
        $name    = $element->getAttribute('name');

        if ($name && ! Str::endsWith($name->value(), '[]'))
            $element = $element->name($name->value().'[]');

        return $element->applyValueToOptions();
    }

    /**
     * @param  string  $name
     *
     * @return static
     */
    public function name($name)
    {
        return $this->attribute('name', $name);
    }

    /**
     * Add options.
     *
     * @param  iterable  $options
     * @param  array     $attributes
     * @param  array     $groupAttributes
     *
     * @return static
     */
    public function options($options, array $attributes = [], array $groupAttributes = [])
    {
        return $this->children($options, function ($text, $value) use ($attributes, $groupAttributes) {
            return is_array($text)
                ? $this->makeOptionsGroup($value, $text, $attributes, $groupAttributes[$value] ?? [])
                : $this->makeOption($value, $text, $attributes[$value] ?? []);
        });
    }

    /**
     * Add a placeholder option.
     *
     * @param  string      $text
     * @param  mixed|null  $value
     * @param  bool        $disabled
     *
     * @return static
     */
    public function placeholder($text, $value = null, $disabled = false)
    {
        return $this->prependChild(
            $this->makeOption($value, $text)
                ->selectedIf( ! $this->hasSelection())
                ->disabled($disabled)
        );
    }

    /**
     * @return static
     */
    public function required()
    {
        return $this->attribute('required');
    }

    /**
     * @param  string|iterable|null  $value
     *
     * @return static
     */
    public function value($value = null)
    {
        $element        = clone $this;
        $element->value = $value;

        return $element->applyValueToOptions();
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Check if has a selected option.
     *
     * @return bool
     */
    protected function hasSelection()
    {
        return $this->children->contains(function (HtmlElement $child) {
            return $child->hasAttribute('selected');
        });
    }

    /**
     * Make an option tag.
     *
     * @param  string  $value
     * @param  string  $text
     * @param  array   $attributes
     *
     * @return \Arcanedev\Html\Elements\Option
     */
    protected function makeOption($value, $text = null, array $attributes = [])
    {
        return Option::make()
            ->value($value)
            ->text($text ?: $value)
            ->selectedIf($value === $this->value)
            ->attributes($attributes);
    }

    /**
     * Make an options group.
     *
     * @param  string  $label
     * @param  array   $options
     * @param  array   $attributes
     * @param  array   $groupAttributes
     *
     * @return \Arcanedev\Html\Elements\Optgroup
     */
    private function makeOptionsGroup($label, array $options, array $attributes = [], array $groupAttributes = [])
    {
        return Optgroup::make()
            ->label($label)
            ->attributes($groupAttributes)
            ->children($options, function ($optionText, $optionValue) use ($attributes) {
                return $this->makeOption($optionValue, $optionText, $attributes[$optionValue] ?? []);
            });
    }

    protected function applyValueToOptions()
    {
        $value = Collection::make($this->value);

        if ( ! $this->hasAttribute('multiple'))
            $value = $value->take(1);

        $this->children = $this->applyValueToElements($value, $this->children);

        return $this;
    }

    protected function applyValueToElements(Collection $value, Collection $children)
    {
        return $children->map(function (HtmlElement $child) use ($value) {
            if ($child instanceof Optgroup)
                return $child->setChildren($this->applyValueToElements($value, $child->children));

            if ($child instanceof Selectable)
                return $child->selectedIf(
                    $value->contains($child->getAttribute('value')->value())
                );

            return $child;
        });
    }
}
