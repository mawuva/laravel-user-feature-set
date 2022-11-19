<?php

return [
    /**
     * Default password to register when password is not setted or provided
     */
    'default_password'  => 'password',

    /*
    |--------------------------------------------------------------------------
    | Password history config
    |--------------------------------------------------------------------------
    */
    'password_history'      => [
        'enabled'           => false,
        'checker'           => false,
        'number_to_check'   => 3,
    ],
];