<?php
Menu::create('shop-menu', function ($menu) {

    $menu->enableOrdering();
    $menu->setPresenter('App\Mircurius\Presenters\SidebarMenuPresenter');
    $categories = config('frontend.categories.config');

    foreach ($categories as $value) {

        $menu->route('category.list', $value['name_ru'], ['id' => $value['id']], 0, ['icon' => $value['icon']]);
    }
});

Menu::create('user-menu', function ($userMenu) {

    $userMenu->enableOrdering();
    $userMenu->setPresenter('App\Mircurius\Presenters\SidebarMenuPresenter');


    $userMenu->route('user.history', 'История заказов');
    $userMenu->route('user.password', 'Сменить пароль');
    $userMenu->route('user.update', 'Редактировать');
    $userMenu->route('user.profile', 'Профиль');
});

