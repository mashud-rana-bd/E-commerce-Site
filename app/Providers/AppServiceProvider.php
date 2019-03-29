<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;
use App\Category;
use App\brand;
use App\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('front-end.include.header', function($view){
            $view->with('categories', Category::where('publication_status', 1)->get());
        });

        View::composer('front-end.include.footer', function($view){
            $view->with('brands', brand::where('publication_status', 1)->get());
        });

      

        

    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
