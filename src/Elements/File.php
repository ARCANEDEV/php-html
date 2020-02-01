<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

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

    /** @var  string */
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

        $this->getAttributes()->set('type', 'file');
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

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
     * Add the required attribute.
     *
     * @return $this
     */
    public function required()
    {
        return $this->attribute('required');
    }

    /**
     * Add the required attribute.
     *
     * @return $this
     */
    public function autofocus()
    {
        return $this->attribute('autofocus');
    }

    /**
     * Add the accept attribute.
     *
     * @param  string  $type
     *
     * @return $this
     */
    public function accept($type)
    {
        return $this->attribute('accept', $type);
    }

    /**
     * Add the accept attribute (audios).
     *
     * @return $this
     */
    public function acceptAudio()
    {
        return $this->accept(self::ACCEPT_AUDIO);
    }

    /**
     * Add the accept attribute (videos).
     *
     * @return $this
     */
    public function acceptVideo()
    {
        return $this->accept(self::ACCEPT_VIDEO);
    }

    /**
     * Add the accept attribute (images).
     *
     * @return $this
     */
    public function acceptImage()
    {
        return $this->accept(self::ACCEPT_IMAGE);
    }

    /**
     * Add the multiple attribute.
     *
     * @return $this
     */
    public function multiple()
    {
        return $this->attribute('multiple');
    }
}
