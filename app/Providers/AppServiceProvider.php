<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->singleton('App\Role', function ($app) {
      if (auth()->user()->manager) {
          return 'Manager';
      } elseif (auth()->user()->admin) {
          return 'Admin';
      } else {
          return 'Pentester';
      }
  });
  
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    //
  }

  
}



