<?php namespace Arcanedev\Html\Elements;

/**
 * Class     File
 *
 * @package  Arcanedev\Html\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class File extends HtmlElement
{
    /* -----------------------------------------------------------------
     |  Constants
     | -----------------------------------------------------------------
     */

    const ACCEPT_AUDIO = 'audio/*';
    const ACCEPT_VIDEO = 'video/*';
    const ACCEPT_IMAGE = 'image/*';

    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    protected $tag = 'input';

    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */

    /**
     * File constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->attributes->set('type', 'file');
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * @param string|null $name
     *
     * @return static
     */
    public function name($name)
    {
        return $this->attribute('name', $name);
    }

    /**
     * @return static
     */
    public function required()
    {
        return $this->attribute('required');
    }

    /**
     * @return static
     */
    public function autofocus()
    {
        return $this->attribute('autofocus');
    }

    /**
     * @param  string  $type
     *
     * @return static
     */
    public function accept($type)
    {
        return $this->attribute('accept', $type);
    }

    /**
     * @return static
     */
    public function acceptAudio()
    {
        return $this->accept(self::ACCEPT_AUDIO);
    }

    /**
     * @return static
     */
    public function acceptVideo()
    {
        return $this->accept(self::ACCEPT_VIDEO);
    }

    /**
     * @return static
     */
    public function acceptImage()
    {
        return $this->accept(self::ACCEPT_IMAGE);
    }

    /**
     * @return static
     */
    public function multiple()
    {
        return $this->attribute('multiple');
    }
}
