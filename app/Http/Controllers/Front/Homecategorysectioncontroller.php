<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adminmodel\ProductCategory;
use App\Models\Product;

class Homecategorysectioncontroller extends Controller
{
    public function home()
    {
        // Get the "shoes" category
        $productcategory = ProductCategory::where('name', 'shoes')
            ->select('id', 'name')
            ->first();
    
        // Get the first 3 products that belong to the "shoes" category
        $products = Product::where('product_category_id', $productcategory->id)
            ->take(3)
            ->get();
        // dd($products);
        return view('user.home', [
            'productcategories' => [$productcategory], // pass the category as an array
            'products' => $products,
        ]);
    }
    
}
