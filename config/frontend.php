<?php

return [
    'prefix' => 'frontend',
    'filter' => [
        'auth' => 'admin.auth',
        'guest' => 'admin.guest',
    ],
    'product' => [
        'model' => 'App\Mircurius\Models\Product',
        'perpage' => 10
    ],
    'product' => [
        'model' => 'App\Mircurius\Models\Brand',
        'perpage' => 10
    ],
    'category' => [
        'model' => 'App\Mircurius\Models\Category',
        'perpage' => 10
    ],
];
