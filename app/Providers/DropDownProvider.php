<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
class DropDownProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('*',function($view){
            $view->with('brand_array',DB::table('brands')->where('is_deleted','=',0)->get());
            });
            view()->composer('*',function($view){
                $view->with('sub_cat_array',DB::table('sub_categories')->where('is_deleted','=',0)->get());
                });
                view()->composer('*',function($view){
                    $view->with('cat_array',DB::table('categories')->where('is_deleted','=',0)->get());
                    });
                    view()->composer('*',function($view){
                        $view->with('user_array',DB::table('users')->get());
                        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
