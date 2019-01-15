<?php namespace Arcanedev\Html\Elements;

use Illuminate\Support\Arr;

/**
 * Class     Dl
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Dl extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    protected $tag = 'dl';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Add a term item.
     *
     * @param  string|mixed  $value
     * @param  array         $attributes
     *
     * @return $this
     */
    public function dt($value, array $attributes = [])
    {
        return $this->addChild(
            $this->makeTerm($value, $attributes)
        );
    }

    /**
     * Add a definition item.
     *
     * @param  string|mixed  $value
     * @param  array         $attributes
     *
     * @return $this
     */
    public function dd($value, array $attributes = [])
    {
        return $this->addChild(
            $this->makeDefinition($value, $attributes)
        );
    }

    /**
     * Add list items.
     *
     * @param  array|iterable  $items
     * @param  array           $attributes
     *
     * @return $this
     */
    public function items($items, array $attributes = [])
    {
        $dtAttributes = Arr::pull($attributes, 'dt', []);
        $ddAttributes = Arr::pull($attributes, 'dd', []);
        $dlItems      = [];

        foreach ($items as $term => $definitions) {
            // DT
            $dlItems[] = $this->makeTerm($term, $attributes)
                ->attributes($dtAttributes);
            // DD
            foreach (Arr::wrap($definitions) as $definition) {
                $dlItems[] = $this->makeDefinition($definition, $attributes)
                    ->attributes($ddAttributes);
            }
        }

        return $this->children($dlItems);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Make a term item.
     *
     * @param  string|mixed  $value
     * @param  array         $attributes
     *
     * @return \Arcanedev\Html\Elements\Element
     */
    protected function makeTerm($value, array $attributes = [])
    {
        return Element::withTag('dt')
            ->attributes($attributes)
            ->html($value);
    }

    /**
     * Make a definition item.
     *
     * @param  string|mixed  $value
     * @param  array         $attributes
     *
     * @return \Arcanedev\Html\Elements\Element
     */
    protected function makeDefinition($value, array $attributes = [])
    {
        return Element::withTag('dd')
            ->attributes($attributes)
            ->html($value);
    }
}
