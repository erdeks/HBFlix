<?php

namespace App\Providers;

use DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Genero;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      /*view()->composer('layouts.app', function($view) {
        $arrayGenero = Genero::all();//DB::table('genero')->get();
        $view->with('nombre', $arrayGenero->nombre);
      });*/
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
