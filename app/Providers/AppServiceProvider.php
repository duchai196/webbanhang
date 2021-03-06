<?php

namespace App\Providers;


use App\Model\Product;
use Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $listCategory=DB::table('categories')->select('categories.*')->where('category_type','product')->join('products','products.category_id','=','categories.id')->distinct()->get();
        $listBrand=DB::table('brands')->select('brands.name')->join('products','products.brand_id','=','brands.id')->distinct()->get();
//        $cart=Cart::content();

        View::share(['listCategory'=>$listCategory,'listBrand'=>$listBrand]);

        View::composer('*', function ($view) {
            $cart=Cart::content();
            $view->with('cart',$cart);
        });
        View::composer('frontend.elements.sidebar',function ($view){
            $maxPrice=Product::select('price')->orderBy('price','desc')->first();
            $minPrice=Product::select('price')->orderBy('price','asc')->first();
            $view->with(['maxPrice'=>$maxPrice,'minPrice'=>$minPrice]);
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
