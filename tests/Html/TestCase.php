<?php namespace Arcanedev\Html\Tests\Html;

use Arcanedev\Html\Html;
use Arcanedev\Html\Tests\TestCase as BaseTestCase;

/**
 * Class     TestCase
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class TestCase extends BaseTestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  \Arcanedev\Html\Html */
    protected $html;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    public function setUp()
    {
        parent::setUp();

        $this->html = new Html;
    }

    protected function tearDown()
    {
        unset($this->html);

        parent::tearDown();
    }
}
