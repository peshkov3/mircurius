<?php namespace App\Mircurius\Providers;

use App\Mircurius\Models\User;
use App\Mircurius\Repositories\User\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;
use App\Mircurius\Models\Product;



class ObserverServiceProvider extends ServiceProvider
{

  /**
   * Bootstrap any necessary services.
   *
   * @return void
   */
  public function boot()
  {
    User::observe( new \App\Mircurius\Observers\UserObserver(new EloquentUserRepository()));
    Product::observe( new \App\Mircurius\Observers\ProductObserver() );
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
  }

}