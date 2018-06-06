<?php

if (! function_exists('uifeedback_get')) {
    /**
     * Generate a CSRF token form field.
     *
     * @return string
     */
    function uifeedback_get()
    {
        return \TsfCorp\UiFeedback\Facades\UiFeedback::get();
    }
}