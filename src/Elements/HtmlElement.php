<?php namespace Arcanedev\Html\Elements;

use Arcanedev\Html\Contracts\Renderable;
use Arcanedev\Html\Entities\Attributes;
use Arcanedev\Html\Entities\ChildrenCollection;
use Arcanedev\Html\Exceptions\{InvalidHtml, MissingTag};
use Arcanedev\Html\Helpers\Arr;
use Closure;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Illuminate\Support\Traits\Macroable;

/**
 * Class     HtmlElement
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @method  \Arcanedev\Html\Elements\HtmlElement|mixed  attributeIf(bool $condition, string $attribute, mixed $value = null)
 * @method  \Arcanedev\Html\Elements\HtmlElement|mixed  attributeUnless(bool $condition, string $attribute, mixed $value = null)
 */
abstract class HtmlElement implements Renderable
{
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use Macroable {
        __call as __callMacro;
    }

    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * The tag type.
     *
     * @var string
     */
    protected $tag;

    /**
     * The element's attributes.
     *
     * @var \Arcanedev\Html\Entities\Attributes
     */
    protected $attributes;

    /**
     * @var \Arcanedev\Html\Entities\ChildrenCollection
     */
    protected $children;

    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */

    /**
     * HtmlElement constructor.
     */
    public function __construct()
    {
        $this->attributes = new Attributes;
        $this->children   = new ChildrenCollection;
    }

    /**
     * Make a html element.
     *
     * @return static
     */
    public static function make()
    {
        return new static;
    }

    /* -----------------------------------------------------------------
     |  Setters & Getters
     | -----------------------------------------------------------------
     */

    /**
     * Get the tag type.
     *
     * @return string
     */
    protected function getTag()
    {
        if (empty($this->tag))
            throw MissingTag::onClass(static::class);

        return $this->tag;
    }

    /**
     * Get the element attributes.
     *
     * @return \Arcanedev\Html\Entities\Attributes
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Set an attribute.
     *
     * @param  string       $attribute
     * @param  string|null  $value
     *
     * @return static
     */
    public function attribute($attribute, $value = null)
    {
        return tap(clone $this, function (HtmlElement $elt) use ($attribute, $value) {
            $elt->getAttributes()->set($attribute, $value);
        });
    }

    /**
     * Set the attributes.
     *
     * @param  iterable|array  $attributes
     *
     * @return static
     */
    public function attributes($attributes)
    {
        return tap(clone $this, function (HtmlElement $elt) use ($attributes) {
            $elt->getAttributes()->setMany($attributes);
        });
    }

    /**
     * Forget attribute.
     *
     * @param  string  $attribute
     *
     * @return static
     */
    public function forgetAttribute($attribute)
    {
        return tap(clone $this, function (HtmlElement $elt) use ($attribute) {
            $elt->getAttributes()->forget($attribute);
        });
    }

    /**
     * Get an attribute.
     *
     * @param  string  $attribute
     * @param  mixed   $default
     *
     * @return \Arcanedev\Html\Entities\Attribute|mixed
     */
    public function getAttribute($attribute, $default = null)
    {
        return $this->getAttributes()->get($attribute, $default);
    }

    /**
     * Check if attribute exists.
     *
     * @param  string  $attribute
     *
     * @return bool
     */
    public function hasAttribute($attribute)
    {
        return $this->getAttributes()->has($attribute);
    }

    /**
     * Add a class.
     *
     * @param  iterable|string  $class
     *
     * @return static
     */
    public function addClass($class)
    {
        return tap(clone $this, function (HtmlElement $elt) use ($class) {
            $elt->getAttributes()->addClass($class);
        });
    }

    /**
     * Add a class (alias).
     *
     * @param  iterable|string  $class
     *
     * @return static
     */
    public function class($class)
    {
        return $this->addClass($class);
    }

    /**
     * Set an id attribute.
     *
     * @param  string  $id
     *
     * @return static
     */
    public function id($id)
    {
        return $this->attribute('id', $id);
    }

    /**
     * @param  array|string  $style
     *
     * @return static
     */
    public function style($style)
    {
        if (is_array($style)) {
            $style = implode('; ', array_map(function ($value, $attribute) {
                return "{$attribute}: {$value}";
            }, $style, array_keys($style)));
        }

        return $this->attribute('style', $style);
    }

    /**
     * Set the data attribute.
     *
     * @param  array|string  $name
     * @param  mixed         $value
     *
     * @return static
     */
    public function data($name, $value = null)
    {
        $attributes = is_array($name) ? $name : [$name => $value];

        return $this->attributes(
            Arr::mapWithKeys($attributes, function ($mapValue, $mapKey) {
                return ["data-{$mapKey}" => $mapValue];
            })
        );
    }

    /**
     * Alias for `addChild`.
     *
     * @param  mixed          $child
     * @param  \Closure|null  $mapper
     *
     * @return static
     */
    public function child($child, Closure $mapper = null)
    {
        return $this->addChild($child, $mapper);
    }

    /**
     * Alias for `addChild`.
     *
     * @param  mixed          $children
     * @param  \Closure|null  $mapper
     *
     * @return static
     */
    public function children($children, Closure $mapper = null)
    {
        return $this->addChild($children, $mapper);
    }

    /**
     * Add a child element to the parent.
     *
     * @param  mixed          $child
     * @param  \Closure|null  $mapper
     *
     * @return static
     */
    public function addChild($child, Closure $mapper = null)
    {
        if (is_null($child))
            return $this;

        return tap(clone $this, function (HtmlElement $elt) use ($child, $mapper) {
            $elt->children = $elt->children->merge(
                ChildrenCollection::parse($child, $mapper)
            );
        });
    }

    /**
     * Replace all children with an array of elements.
     *
     * @param  mixed          $children
     * @param  \Closure|null  $mapper
     *
     * @return static
     */
    public function setChildren($children, Closure $mapper = null)
    {
        return tap(clone $this, function (HtmlElement $element) {
            $element->children = new ChildrenCollection;
        })->addChild($children, $mapper);
    }

    /**
     * @param  mixed          $children
     * @param  \Closure|null  $mapper
     *
     * @return static
     */
    public function prependChildren($children, Closure $mapper = null)
    {
        return tap(clone $this, function (HtmlElement $elt) use ($children, $mapper) {
            $elt->children = ChildrenCollection::parse($children, $mapper)->merge($elt->children);
        });
    }

    /**
     * Alias for `prependChildren`.
     *
     * @param  \Arcanedev\Html\Elements\HtmlElement|string|iterable  $children
     * @param  \Closure|null                                         $mapper
     *
     * @return static
     */
    public function prependChild($children, $mapper = null)
    {
        return $this->prependChildren($children, $mapper);
    }

    /**
     * Get the child elements.
     *
     * @return \Arcanedev\Html\Entities\ChildrenCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set the text.
     *
     * @param  string  $text
     * @param  bool    $doubleEncode
     *
     * @return static
     */
    public function text($text, $doubleEncode = false)
    {
        return $this->html(e($text, $doubleEncode));
    }

    /**
     * @param  string|null  $html
     *
     * @return static
     *
     * @throws \Arcanedev\Html\Exceptions\InvalidHtml
     */
    public function html($html)
    {
        if ($this->isVoidElement())
            throw new InvalidHtml("Can't set inner contents on `{$this->getTag()}` because it's a void element");

        return $this->setChildren($html);
    }

    /**
     * Conditionally transform the element.
     * Note that since elements are immutable, you'll need to return a new instance from the callback.
     *
     * @param  bool      $condition
     * @param  \Closure  $callback
     *
     * @return \Arcanedev\Html\Elements\HtmlElement|mixed
     */
    public function if(bool $condition, Closure $callback)
    {
        return $condition ? $callback($this) : $this;
    }

    /**
     * Conditionally transform the element.
     * Note that since elements are immutable, you'll need to return a new instance from the callback.
     *
     * @param  bool      $condition
     * @param  \Closure  $callback
     *
     * @return \Arcanedev\Html\Elements\HtmlElement|mixed
     */
    public function unless(bool $condition, Closure $callback)
    {
        return $this->if( ! $condition, $callback);
    }

    /**
     * Open the html element.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function open()
    {
        $html = $this->hasAttributes()
            ? "<{$this->getTag()} {$this->getAttributes()->render()}>"
            : "<{$this->getTag()}>";

        return new HtmlString(
            $html . $this->children->toHtml()
        );
    }

    /**
     * Close the html element.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function close()
    {
        return new HtmlString(
            $this->isVoidElement() ? '' : "</{$this->getTag()}>"
        );
    }

    /**
     * Render the element to HtmlString object.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function render()
    {
        return new HtmlString(
            $this->toHtml()
        );
    }

    /**
     * Render the element to string.
     *
     * @return string
     */
    public function toHtml()
    {
        return $this->open()->toHtml().
               $this->close()->toHtml();
    }

    /* -----------------------------------------------------------------
     |  Check Methods
     | -----------------------------------------------------------------
     */

    /**
     * Check if the element has attributes.
     *
     * @return bool
     */
    public function hasAttributes()
    {
        return $this->getAttributes()->isNotEmpty();
    }

    /**
     * Check if the tag is a void element.
     *
     * @return bool
     */
    public function isVoidElement(): bool
    {
        return in_array($this->getTag(), [
            'area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'keygen',
            'link', 'menuitem', 'meta', 'param', 'source', 'track', 'wbr',
        ]);
    }

    /* -----------------------------------------------------------------
     |  Magic Methods
     | -----------------------------------------------------------------
     */

    /**
     * Render the element to string (magic method).
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toHtml();
    }

    /**
     * Dynamically handle calls to the class.
     * Check for methods finishing by If or fallback to Macroable.
     *
     * @param  string  $name
     * @param  array   $arguments
     *
     * @return mixed
     *
     * @throws \BadMethodCallException
     */
    public function __call($name, array $arguments = [])
    {
        if (Str::endsWith($name, $conditions = ['If', 'Unless'])) {
            foreach ($conditions as $condition) {
                if (method_exists($this, $method = str_replace($condition, '', $name)))
                    return $this->callConditionalMethod($condition, $method, $arguments);
            }
        }

        return $this->__callMacro($name, $arguments);
    }

    /**
     * Call the if condition.
     *
     * @param  string  $type
     * @param  string  $method
     * @param  array   $arguments
     *
     * @return \Arcanedev\Html\Elements\HtmlElement|mixed
     */
    protected function callConditionalMethod($type, $method, array $arguments)
    {
        $condition = (bool) array_shift($arguments);
        $callback  = function () use ($method, $arguments) {
            return $this->{$method}(...$arguments);
        };

        switch ($type) {
            case 'If':
                return $this->if($condition, $callback);

            case 'Unless':
                return $this->unless($condition, $callback);

            default:
                return $this;
        }
    }

    public function __clone()
    {
        $this->attributes = clone $this->attributes;
        $this->children   = clone $this->children;
    }
}
