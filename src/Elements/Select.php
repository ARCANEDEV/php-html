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
     * Set the select input as multiple.
     *
     * @return $this
     */
    public function multiple()
    {
        /** @var  self  $elt */
        $elt  = with(clone $this)->attribute('multiple');
        $name = $elt->getAttribute('name');

        return $elt->if($name && ! Str::endsWith($name->value(), '[]'), function (self $elt) use ($name) {
            return $elt->name($name->value().'[]');
        })->applyValueToOptions();
    }

    /**
     * Add the name attribute.
     *
     * @param  string  $name
     *
     * @return $this
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
     * @return $this
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
     * @return $this
     */
    public function placeholder($text, $value = null, $disabled = false)
    {
        return $this->prependChild(
            $this->makeOption($value, $text)
                 ->selectedUnless($this->hasSelection())
                 ->disabled($disabled)
        );
    }

    /**
     * Add the required attribute.
     *
     * @return $this
     */
    public function required()
    {
        return $this->attribute('required');
    }

    /**
     * Set the value.
     *
     * @param  string|iterable|null  $value
     *
     * @return $this
     */
    public function value($value = null)
    {
        return tap(clone $this, function ($element) use ($value) {
            $element->value = $value;
        })->applyValueToOptions();
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
        return $this->getChildren()->contains(function (HtmlElement $child) {
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
            ->text($text ?: $value, false)
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
    protected function makeOptionsGroup($label, array $options, array $attributes = [], array $groupAttributes = [])
    {
        return Optgroup::make()
            ->label($label)
            ->attributes($groupAttributes)
            ->children($options, function ($optionText, $optionValue) use ($attributes) {
                return $this->makeOption($optionValue, $optionText, $attributes[$optionValue] ?? []);
            });
    }

    /**
     * Apply the selected value to the options.
     *
     * @return static
     */
    protected function applyValueToOptions()
    {
        $value = Collection::make($this->value);

        if ( ! $this->hasAttribute('multiple'))
            $value = $value->take(1);

        return $this->setNewChildren(
            static::applyValueToElements($value, $this->getChildren())
        );
    }

    /**
     * Apply the selected value to the options.
     *
     * @param  \Illuminate\Support\Collection  $value
     * @param  \Illuminate\Support\Collection  $children
     *
     * @return \Illuminate\Support\Collection
     */
    protected static function applyValueToElements(Collection $value, Collection $children)
    {
        return $children->map(function (HtmlElement $child) use ($value) {
            if ($child instanceof Optgroup)
                return $child->setNewChildren(static::applyValueToElements($value, $child->getChildren()));

            if ($child instanceof Selectable)
                return $child->selectedIf(
                    $value->contains($child->getAttribute('value')->value())
                );

            return $child;
        });
    }
}
