<?php

namespace TsfCorp\UiFeedback\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @method static void primary(string $message = "", bool $show_close_button = false)
 * @method static void secondary(string $message = "", bool $show_close_button = false)
 * @method static void success(string $message = "", bool $show_close_button = false)
 * @method static void danger(string $message = "", bool $show_close_button = false)
 * @method static void warning(string $message = "", bool $show_close_button = false)
 * @method static void info(string $message = "", bool $show_close_button = false)
 * @method static void light(string $message = "", bool $show_close_button = false)
 * @method static void dark(string $message = "", bool $show_close_button = false)
 *
 * @see \TsfCorp\UiFeedback\UiFeedback
 */
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