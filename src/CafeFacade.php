<?php

namespace WebId\Cafe;

use Illuminate\Support\Facades\Facade;

/**
 * @see \WebId\Cafe\Cafe
 */
class CafeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cafe';
    }
}
