<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

use Arcanedev\Html\Elements\Concerns\{HasAutofocusAttribute, HasNameAttribute, HasRequiredAttribute};

/**
 * Class     File
 *
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
     |  Traits
     | -----------------------------------------------------------------
     */

    use HasAutofocusAttribute,
        HasNameAttribute,
        HasRequiredAttribute;

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
