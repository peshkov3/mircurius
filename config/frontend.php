<?php

return [
    'prefix' => 'frontend',
    'filter' => [
        'auth' => 'admin.auth',
        'guest' => 'admin.guest',
    ],
    'categories'=>[
        'items'=>['suveniry','igrushki','tovary-dlya-detey','knigi', 'prazdniki'],
        'config' =>[
            'suveniry'=>[
                'id'=>'2851',
                'icon' => 'fa fa-plus',
                'name_ru'=>'Сувениры',
                'name_kz'=>'Сувениры kz',
                'name_en'=>'Сувениры en',
            ],
            'igrushki'=>[
                'id'=>'687',
                'icon' => 'fa fa-phone',
                'name_ru'=>'Игрушки',
                'name_kz'=>'Игрушки kz',
                'name_en'=>'Игрушки en',
            ],
            'tovary-dlya-detey'=>[
                'id'=>'5891',
                'icon' => 'fa fa-envelope',
                'name_ru'=>'Товары для детей',
                'name_kz'=>'Товары для детей kz',
                'name_en'=>'Товары для детей en',
            ],
            'knigi'=>[
                'id'=>'1913',
                'icon' => 'fa fa-fax',
                'name_ru'=>'Книги',
                'name_kz'=>'Книги kz',
                'name_en'=>'Книги en',
            ], 
            'prazdniki'=>[
                'id'=>'3003',
                'icon' => 'fa fa-fax',
                'name_ru'=>'Праздники',
                'name_kz'=>'Праздники kz',
                'name_en'=>'Праздники en',
            ]
        
        ],
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
