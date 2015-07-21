<?php
/**
 * Created by IntelliJ IDEA.
 * User: peshkov
 * Date: 30.06.15
 * Time: 11:09
 */

namespace App\Mircurius\Repositories\Country;


use Illuminate\Support\ServiceProvider;

class CountryRepositoryServiceProvider extends ServiceProvider {

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
            'App\Mircurius\Repositories\Product\ProductRepository',
            'App\Mircurius\Repositories\Product\EloquentProductRepository'
        );
    }

}