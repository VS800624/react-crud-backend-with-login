<?php

return [

    'paths' => ['api/*'],

    'allowed_methods' => ['*'],

    // 'allowed_origins' => ['http://localhost:5173'], // or ['*'] for all
    'allowed_origins' => ['*'], // or ['*'] for all

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];

