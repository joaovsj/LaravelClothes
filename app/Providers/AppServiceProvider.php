<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use \App\Models\Categoria;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // resolvendo problema de versao do MySQL para os migratiosn rodarem
        Schema::defaultStringLength(191);

        $categories = Categoria::all();
        view()->share('categories', $categories);
    }
}
