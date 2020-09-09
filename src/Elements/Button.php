<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

use Arcanedev\Html\Elements\Concerns\{HasNameAttribute, HasTypeAttribute, HasValueAttribute};

/**
 * Class     Button
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Button extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use HasNameAttribute,
        HasTypeAttribute,
        HasValueAttribute;

    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string */
    protected $tag = 'button';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Set as submit button.
     *
     * @return \Arcanedev\Html\Elements\Button
     */
    public function submit()
    {
        return $this->type('submit');
    }

    /**
     * Set as reset button.
     *
     * @return \Arcanedev\Html\Elements\Button
     */
    public function reset()
    {
        return $this->type('reset');
    }
}
