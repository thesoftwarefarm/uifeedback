<?php

namespace TsfCorp\UiFeedback\Facades;


use Illuminate\Support\Facades\Facade;

class UiFeedback extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'uifeedback';
    }

}