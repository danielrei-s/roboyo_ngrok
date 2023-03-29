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
      if (auth()->user()->admin == '0') {
        return 'Pentester';
    } elseif (auth()->user()->admin == '1') {
        return 'Manager';
    } elseif (auth()->user()->admin == '2') {
        return 'Admin';
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



