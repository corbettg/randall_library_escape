<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RandallAuthServiceProvider extends ServiceProvider {

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {
    //
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register() {
    foreach (glob(app_path() . '/RandallAuth/*.php') as $filename) {
      require_once($filename);
    }
  }

}
