<?php

declare(strict_types=1);

namespace Arcanedev\Html\Contracts;

/**
 * Interface     Selectable
 *
 * @package  Arcanedev\Html\Contracts
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface Selectable
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * @return static
     */
    public function selected();

    /**
     * @param  bool  $condition
     *
     * @return static
     */
    public function selectedIf($condition);

    /**
     * @return static
     */
    public function unselected();
}
