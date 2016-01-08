<?php

namespace CedricZiel\L5Shariff;

use Illuminate\Support\Facades\Facade;

/**
 * Class ShariffFacade
 * Facade for short access to the Shariff component.
 *
 * @package CedricZiel\L5Shariff
 */
class ShariffFacade extends Facade
{
    /**
     * Gets the component
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'shariff';
    }
}
