<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use  App\Models\Adminmodel\ProductCategory;
use App\Models\Adminmodel\Category;

class CustomerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
          
               
             $mencategory=Category::where('name','men')->first();
             \Log::info('Men Category:', ['category' => $mencategory]);
             
             $tshirtcategory=ProductCategory::where('name','like','Tshirt')->first();
             $shirtcategory=ProductCategory::where('name','like','Shirts')->first();
             $trousercategory=ProductCategory::where('name','like','Trousers & Pants')->first();
             $jeanscategory=ProductCategory::where('name','like','Jeans')->first();
            //  $trouserscategory=ProductCategory::where('name','like','Trousers & Pants');

             $menproductcategories=ProductCategory::where('category_id',$mencategory->id)->get();
           
             $womencategory=Category::where('name','women')->first();
             \Log::info('Women Category:', ['category' => $womencategory]);

             $womenproductcategories=ProductCategory::where('category_id',$womencategory->id)->get();

            $categoryname=Category::all();


                $view->with('categoriesname', $categoryname);


                $view->with('menproductcategories', $menproductcategories);
                $view->with('womenproductcategories', $womenproductcategories);
                $view->with('tshirtcategory', $tshirtcategory);
                $view->with('shirtcategory', $shirtcategory);
                $view->with('trousercategory', $trousercategory);
                $view->with('jeanscategory', $jeanscategory);


          
        });
    }
}
