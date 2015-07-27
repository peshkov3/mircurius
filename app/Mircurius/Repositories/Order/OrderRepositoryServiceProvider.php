<?php
/**
 * Created by IntelliJ IDEA.
 * Order: peshkov
 * Date: 30.06.15
 * Time: 11:09
 */

namespace App\Mircurius\Repositories\Order;


use Illuminate\Support\ServiceProvider;

class OrderRepositoryServiceProvider extends ServiceProvider {

    public function boot()
    {
        //
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Mircurius\Repositories\Order\OrderRepository',
            'App\Mircurius\Repositories\Order\EloquentOrderRepository'
        );
    }

}