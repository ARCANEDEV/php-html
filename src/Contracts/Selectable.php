<?php

declare(strict_types=1);

namespace Arcanedev\Html\Contracts;

/**
 * Interface  Selectable
 *
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface Selectable
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Add the selected attribute.
     *
     * @param  bool  $selected
     *
     * @return $this
     */
    public function selected(bool $selected = true);

    /**
     * @param  bool  $condition
     *
     * @return $this
     */
    public function selectedIf($condition);

    /**
     * @return $this
     */
    public function unselected();
}
