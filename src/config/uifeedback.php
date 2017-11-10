<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Session key
    |--------------------------------------------------------------------------
    |
    | Change default session key, where messages are saved
    |
    */
    'key' => 'uifeedback',

    /*
    |--------------------------------------------------------------------------
    | Validation errors
    |--------------------------------------------------------------------------
    |
    | Laravel validator will store errors in session
    | These can be captured by UiFeedback and display automatically
    |
    */
    'capture_validation_errors' => true,

    /*
    |--------------------------------------------------------------------------
    | Group errors
    |--------------------------------------------------------------------------
    |
    | When there are multiple errors set, these will be
    | displayed separately by default. Changing group_errors = true
    | will display all errors grouped in the same container
    |
    */
    'group_errors' => false,
];
