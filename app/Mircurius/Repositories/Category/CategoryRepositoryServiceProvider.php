<?php
/**
 * Created by IntelliJ IDEA.
 * User: peshkov
 * Date: 30.06.15
 * Time: 11:12
 */

namespace App\Mircurius\Repositories\Category;


use Illuminate\Support\ServiceProvider;

class CategoryRepositoryServiceProvider extends ServiceProvider {

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
            'App\Mircurius\Repositories\Category\CategoryRepository',
            'App\Mircurius\Repositories\Category\EloquentCategoryRepository'
        );
    }

}