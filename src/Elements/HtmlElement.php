<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

use Arcanedev\Html\Contracts\Elements\HtmlElement as HtmlElementContract;
use Arcanedev\Html\Exceptions\{InvalidHtmlException, MissingTagException};
use Illuminate\Support\{Collection, HtmlString, Str};
use Illuminate\Support\Traits\Macroable;

/**
 * Class     HtmlElement
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @method  \Arcanedev\Html\Elements\HtmlElement|mixed  attributeIf(bool $condition, string $attribute, mixed $value = null)
 * @method  \Arcanedev\Html\Elements\HtmlElement|mixed  attributeUnless(bool $condition, string $attribute, mixed $value = null)
 * @method  \Arcanedev\Html\Elements\HtmlElement|mixed  attributeIfNotNull(mixed $valueToCheck, string $attribute, mixed $value = null)
 */
abstract class HtmlElement implements HtmlElementContract
{
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use Concerns\HasAttributes,
        Concerns\HasChildElements,
        Concerns\HasConditionalMethods,
        Macroable {
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

    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */

    /**
     * HtmlElement constructor.
     */
    public function __construct()
    {
        $this->initAttributes();
        $this->initChildren();
    }

    /**
     * Make a html element.
     *
     * @return $this
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
     *
     * @throws \Arcanedev\Html\Exceptions\MissingTagException
     */
    protected function getTag()
    {
        if (empty($this->tag)) {
            throw MissingTagException::onClass(static::class);
        }

        return $this->tag;
    }

    /**
     * Set an id attribute.
     *
     * @param  string  $id
     *
     * @return $this
     */
    public function id($id)
    {
        return $this->attribute('id', $id);
    }

    /**
     * Get the class attribute.
     *
     * @return \Arcanedev\Html\Entities\Attributes\ClassAttribute
     */
    public function classList()
    {
        return $this->getAttributes()->classList();
    }

    /**
     * Add a class (alias).
     *
     * @param  iterable|string  $class
     *
     * @return $this
     */
    public function class($class)
    {
        return tap(clone $this, function (HtmlElement $elt) use ($class) {
            $elt->getAttributes()->addClass($class);
        });
    }

    /**
     * Push a class to the list.
     *
     * @param  string  $class
     *
     * @return $this
     */
    public function pushClass($class)
    {
        return tap(clone $this, function (HtmlElement $elt) use ($class) {
            $elt->classList()->push($class);
        });
    }

    /**
     * Set the style attribute.
     *
     * @param  array|string  $style
     *
     * @return $this
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
     * @return $this
     */
    public function data($name, $value = null)
    {
        $attributes = Collection::make(
            is_array($name) ? $name : [$name => $value]
        )->mapWithKeys(function ($mapValue, $mapKey) {
            return ["data-{$mapKey}" => $mapValue];
        });

        return $this->attributes($attributes);
    }

    /**
     * Set the text.
     *
     * @param  string  $text
     * @param  bool    $doubleEncode
     *
     * @return $this
     */
    public function text($text, $doubleEncode = true)
    {
        return $this->html(e($text, $doubleEncode));
    }

    /**
     * Add an html child/children.
     *
     * @param  string|null  $html
     *
     * @return $this
     *
     * @throws \Arcanedev\Html\Exceptions\InvalidHtmlException
     */
    public function html($html)
    {
        if ($this->isVoidElement()) {
            throw InvalidHtmlException::onTag($this->getTag());
        }

        return $this->setNewChildren($html);
    }

    /**
     * Open the html element.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function open()
    {
        $attributes = $this->getAttributes();

        $html = $attributes->isNotEmpty()
            ? "<{$this->getTag()} {$attributes->render()}>"
            : "<{$this->getTag()}>";

        return new HtmlString(
            $html . $this->getChildren()->toHtml()
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
        return new HtmlString($this->toHtml());
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
     */
    public function __call($name, array $arguments = [])
    {
        if (Str::endsWith($name, $this->supportedConditions)) {
            foreach ($this->supportedConditions as $condition) {
                if (method_exists($this, $method = str_replace($condition, '', $name))) {
                    return $this->callConditionalMethod($condition, $method, $arguments);
                }
            }
        }

        return $this->__callMacro($name, $arguments);
    }

    /**
     * Clone the object.
     */
    public function __clone()
    {
        $this->attributes = clone $this->attributes;
        $this->children   = clone $this->children;
    }
}
