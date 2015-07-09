<?php
Menu::create('shop-menu', function ($menu) {
    
    $menu->enableOrdering();
    $menu->setPresenter('App\Mircurius\Presenters\SidebarMenuPresenter');
    $categories=config('frontend.categories.config');
    
    foreach($categories as $value){
          $menu->route('get.category', $value['name_ru'], ['id'=>$value['id']], 0, ['icon' => $value['icon']]);
    }
    
});
