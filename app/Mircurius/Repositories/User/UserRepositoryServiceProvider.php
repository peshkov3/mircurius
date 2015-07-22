<?php
/**
 * Created by IntelliJ IDEA.
 * User: peshkov
 * Date: 30.06.15
 * Time: 11:09
 */

namespace App\Mircurius\Repositories\User;


use Illuminate\Support\ServiceProvider;

class UserRepositoryServiceProvider extends ServiceProvider {

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
            'App\Mircurius\Repositories\User\UserRepository',
            'App\Mircurius\Repositories\User\EloquentUserRepository'
        );
    }

}