<?php

namespace TsfCorp\UiFeedback\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @method static void primary(string|array $message = "", bool $show_close_button = false)
 * @method static void secondary(string|array $message = "", bool $show_close_button = false)
 * @method static void success(string|array $message = "", bool $show_close_button = false)
 * @method static void danger(string|array $message = "", bool $show_close_button = false)
 * @method static void warning(string|array $message = "", bool $show_close_button = false)
 * @method static void info(string|array $message = "", bool $show_close_button = false)
 * @method static void light(string|array $message = "", bool $show_close_button = false)
 * @method static void dark(string|array $message = "", bool $show_close_button = false)
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
