<?php

return [
    'view'=>[
        'layout'=>'layout.frontend_layout'
    ],
    'prefix' => 'frontend',
    'filter' => [
        'auth' => 'admin.auth',
        'guest' => 'admin.guest',
    ],
    'categories'=>[
        'items'=>['igrushki','tovary-dlya-detey','prazdniki'],
        'config' =>[
            'igrushki'=>[
                'id'=>'687',
                'icon' => '',
                'name_ru'=>'Игрушки',
                'name_kz'=>'Игрушки kz',
                'name_en'=>'Игрушки en',
            ],
            'tovary-dlya-detey'=>[
                'id'=>'5891',
                'icon' => '',
                'name_ru'=>'Товары для детей',
                'name_kz'=>'Товары для детей kz',
                'name_en'=>'Товары для детей en',
            ],
            'prazdniki'=>[
                'id'=>'3003',
                'icon' => '',
                'name_ru'=>'Праздники',
                'name_kz'=>'Праздники kz',
                'name_en'=>'Праздники en',
            ]
        
        ],
    ],
    'product' => [
        'model' => 'App\Mircurius\Models\Product',
        'perpage' => 9
    ],
    'category' => [
        'model' => 'App\Mircurius\Models\Category',
        'perpage' => 10
    ],
    'brand' => [
        'model' => 'App\Mircurius\Models\Brand',
        'perpage' => 10
    ],
];
