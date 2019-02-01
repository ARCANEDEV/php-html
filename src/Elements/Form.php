<?php namespace Arcanedev\Html\Elements;

/**
 * Class     Form
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Form extends HtmlElement
{
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
     * @return $this
     */
    public function novalidate()
    {
        return $this->attribute('novalidate');
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
