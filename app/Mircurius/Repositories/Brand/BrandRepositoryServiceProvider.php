<?php
/**
 * Created by IntelliJ IDEA.
 * User: peshkov
 * Date: 30.06.15
 * Time: 11:12
 */

namespace App\Mircurius\Repositories\Brand;


use Illuminate\Support\ServiceProvider;

class BrandRepositoryServiceProvider extends ServiceProvider {

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
            'App\Mircurius\Repositories\Category\BrandRepository',
            'App\Mircurius\Repositories\Category\EloquentCategoryRepository'
        );
    }

}