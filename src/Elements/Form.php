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

    protected $tag = 'form';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * @param  string|null  $action
     *
     * @return static
     */
    public function action($action)
    {
        return $this->attribute('action', $action);
    }

    /**
     * @param  string|null  $method
     *
     * @return static
     */
    public function method($method)
    {
        $method = strtoupper($method);

        return $this->attribute('method', $method === 'GET' ? 'GET' : 'POST');
    }

    /**
     * @return static
     */
    public function novalidate()
    {
        return $this->attribute('novalidate');
    }

    /**
     * @return static
     */
    public function acceptsFiles()
    {
        return $this->attribute('enctype', 'multipart/form-data');
    }
}
