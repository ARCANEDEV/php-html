<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

use Arcanedev\Html\Elements\Concerns\HasTargetAttribute;

/**
 * Class     Form
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Form extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use HasTargetAttribute;

    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string */
    protected $tag = 'form';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Add the action attribute.
     *
     * @param  string|null  $action
     *
     * @return $this
     */
    public function action($action)
    {
        return $this->attribute('action', $action);
    }

    /**
     * Add the method attribute.
     *
     * @param  string|null  $method
     *
     * @return $this
     */
    public function method($method)
    {
        $method = strtoupper($method);

        return $this->attribute('method', $method === 'GET' ? 'GET' : 'POST');
    }

    /**
     * Add the novalidate attribute.
     *
     * @param  bool  $novalidate
     *
     * @return $this
     */
    public function novalidate(bool $novalidate = true)
    {
        return $novalidate
            ? $this->attribute('novalidate')
            : $this->forgetAttribute('novalidate');
    }

    /**
     * Add the enctype attribute for files.
     *
     * @return $this
     */
    public function acceptsFiles()
    {
        return $this->attribute('enctype', 'multipart/form-data');
    }
}
