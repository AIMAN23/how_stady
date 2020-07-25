<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'student'       => ['driver' => 'session',   'provider' => 'students',],
        'pareent'       => ['driver' => 'session',   'provider' => 'pareents',],
        'teacher'       => ['driver' => 'session',   'provider' => 'teachers',],
        'supervisor'    => ['driver' => 'session',   'provider' => 'supervisors',],
        'secretary'     => ['driver' => 'session',   'provider' => 'secretarise',],
        'financial'     => ['driver' => 'session',   'provider' => 'financials',],
        'specialist'    => ['driver' => 'session',   'provider' => 'specialists',],
        'admin'         => ['driver' => 'session',   'provider' => 'admins',],
        'agent'         => ['driver' => 'session',   'provider' => 'agents',],
        'manager'       => ['driver' => 'session',   'provider' => 'managers',],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],

        // 'admin' => [
        //     'driver' => 'session',
        //     'provider' => 'schools',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        'students'       => ['driver' => 'eloquent',   'model' =>  App\Models\Student::class,], ##
        'pareents' => ['driver' => 'eloquent', 'model' => App\Models\Pareent::class,],
        'teachers'       => ['driver' => 'eloquent',   'model' =>  App\Models\Teacher::class,], ##
        'supervisors' => ['driver' => 'eloquent', 'model' => App\Models\Supervisor::class,],
        'secretarise'     => ['driver' => 'eloquent',   'model' =>  App\Models\Secretary::class,], ##
        'financials'     => ['driver' => 'eloquent',   'model' =>  App\Models\Financial::class,], ##
        'specialists'    => ['driver' => 'eloquent',   'model' =>  App\Models\Specialist::class,], ##
        'admins' => ['driver' => 'eloquent', 'model' => App\Models\SchoolAdmin::class,],
        'agents' => ['driver' => 'eloquent', 'model' => App\Models\Agent::class,],
        'managers' => ['driver' => 'eloquent', 'model' => App\Models\Manager::class,],


        // 'schools' => [
        //     'driver' => 'database',
        //     'table' => 'schools',
        // ],

        // 'admins' => [
        //     'driver' => 'database',
        //     'table' => 'school_admins',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',   'expire' => 60, 'throttle' => 60,
        ],

        'students' => [
            'provider' => 'students',
            'table' => 'password_resets',   'expire' => 60, 'throttle' => 60,
        ], ##

        'pareents' => [
            'provider' => 'pareents',
            'table' => 'password_resets',   'expire' => 60, 'throttle' => 60,
        ],

        'teachers' => [
            'provider' => 'teachers',
            'table' => 'password_resets',   'expire' => 60, 'throttle' => 60,
        ], ##

        'supervisors' => [
            'provider' => 'supervisors',
            'table' => 'password_resets',   'expire' => 60, 'throttle' => 60,
        ],

        'secretarise' => [
            'provider' => 'secretarise',
            'table' => 'password_resets',   'expire' => 60, 'throttle' => 60,
        ], ##

        'financials' => [
            'provider' => 'financials',
            'table' => 'password_resets',   'expire' => 60, 'throttle' => 60,
        ], ##

        'specialists' => [
            'provider' => 'specialists',
            'table' => 'password_resets',   'expire' => 60, 'throttle' => 60,
        ], ##

        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',   'expire' => 60, 'throttle' => 60,
        ],

        'agents' => [
            'provider' => 'agents',
            'table' => 'password_resets',   'expire' => 60, 'throttle' => 60,
        ],

        'managers' => [
            'provider' => 'managers',
            'table' => 'password_resets',   'expire' => 60, 'throttle' => 60,
        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800,

];
