<?php namespace App\Mircurius\Providers;

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