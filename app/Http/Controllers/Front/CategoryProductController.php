<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adminmodel\ProductCategory;
use App\Models\Adminmodel\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class CategoryProductController extends Controller
{
    public function showmen(Request $request){

        $value = $request->query('value'); // Retrieve the 'value' query parameter
   
    $category =Category::where('name', $value)->first();
        // $product=ProductCategory::all();
        $products=DB::table('product_categories')
        ->join('categories','categories.id','=','product_categories.category_id')
        ->select('product_categories.*')
        ->where('product_categories.category_id', $category->id)
        ->get();
       
        return view('user.men_product',compact('products'));
    }
    public function getmen($id){
        $category = DB::table('product_categories')
            ->where('id', $id)
            ->first();
    
        $products = DB::table('products')
            ->join('product_categories', 'product_categories.id', '=', 'products.product_category_id')
            ->select('products.*', 'product_categories.name as pname')
            ->where('products.product_category_id', $id)
            ->get();
    
        return view('user.menproductlist', [
            'products' => $products,
            'categoryName' => $category->name ?? 'Unknown Category'
        ]);
    }
    




    public function showwomen(Request $request){
        
        $value = $request->query('value'); // Retrieve the 'value' query parameter
   
    $category =Category::where('name', $value)->first();
        // $product=ProductCategory::all();
        $products=DB::table('product_categories')
        ->join('categories','categories.id','=','product_categories.category_id')
        ->select('product_categories.*')
        ->where('product_categories.category_id', $category->id)
        ->get();
       
        return view('user.women_product',compact('products'));
     
    }

    public function getwomen($id){
        $category = DB::table('product_categories')
            ->where('id', $id)
            ->first();
    
        $products = DB::table('products')
            ->join('product_categories', 'product_categories.id', '=', 'products.product_category_id')
            ->select('products.*', 'product_categories.name as pname')
            ->where('products.product_category_id', $id)
            ->get();
    
        return view('user.menproductlist', [
            'products' => $products,
            'categoryName' => $category->name ?? 'Unknown Category'
        ]);
    }
    
    public function filter(Request $request){

        $sort = $request->input('sort');
       $is_procatid=$request->input('catid','');
          
     if($is_procatid){

       
        $sortDirection = 'asc'; // Default sort direction
        if ($sort === 'highest') {
        $sortDirection = 'desc';
        }

        if($sort==='new'){
       
            $products=DB::table('products')
            ->select('products.*')
            ->where('products.product_category_id',$is_procatid)
            ->orderBy('id','desc')
  
            ->get();
        }else{
                  $products=DB::table('products')
          ->select('products.*')
          ->where('products.product_category_id',$is_procatid)
          ->orderBy('products.price',$sortDirection)

          ->get();
        }
          
          $productsArray = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'image_url' => $product->image_url,
                'price' => $product->price,
                'product_Availability'=>$product->product_Availability,
                'details_url' => route('front.details', ['id' => $product->id]),
                'add_to_cart_url' => route('front.addtocart', $product->id),
            ];
        });
    
        return response()->json([
            'success' => true,
            'products' => $productsArray,
        ]);
        
        }else{

             $sortDirection = 'asc'; // Default sort direction
        if ($sort === 'highest') {
        $sortDirection = 'desc';
    }

    if($sort==='new'){
       
        $products=DB::table('products')
        ->select('id', 'name', 'image_url', 'price','product_Availability')
        // ->where('products.product_category_id',$is_procatid)
        ->orderBy('id','desc')

        ->get();
    }else{

    // Fetch products based on the sort criteria using query builder
    $products = DB::table('products')
        ->select('id', 'name', 'image_url', 'price','product_Availability')
        ->orderBy('price', $sortDirection)
        ->get();

    }
    // Prepare the products array for the response
    $productsArray = $products->map(function ($product) {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'image_url' => $product->image_url,
            'price' => $product->price,
            'product_Availability'=>$product->product_Availability,
            'details_url' => route('front.details', ['id' => $product->id]),
            'add_to_cart_url' => route('front.addtocart', $product->id),
        ];
    });

    return response()->json([
        'success' => true,
        'products' => $productsArray,
    ]);
}
    
}
public function ajaxfilter(Request $request)
{
    $procatid = $request->input('catid');

    if ($procatid) {
        $products = DB::table('products')
            ->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
            ->select('products.*')
            ->where('products.product_category_id', $procatid)
            ->get();

        // Create the response data array, including the details URL for each product
        $productsData = $products->map(function ($product) {
            return [
                'product' => $product,
                'details_url' => route('front.details', ['id' => $product->id]),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $productsData,
        ]);
    }

    // If no category ID is provided, return an empty response or handle accordingly
    return response()->json(['success' => false, 'data' => []]);
}

public function newajaxfilter(Request $request)
{
    $categoryIds = $request->input('categories', []);

    if (!empty($categoryIds)) {
        $products = DB::table('products')
            ->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
            ->select('products.*')
            ->whereIn('products.product_category_id', $categoryIds)
            ->get();

        // Create the response data array, including the details URL for each product
        $productsData = $products->map(function ($product) {
            return [
                'product' => $product,
                'details_url' => route('front.details', ['id' => $product->id]),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $productsData,
        ]);
    }

    // If no category IDs are provided, return an empty response or handle accordingly
    // return response()->json(['success' => false, 'data' => []]);
      $products=Product::all();
      $productsData = $products->map(function ($product) {
        return [
            'product' => $product,
            'details_url' => route('front.details', ['id' => $product->id]),
        ];
    });
    
    return response()->json(['success'=>true,'data'=>$productsData]);
}
public function newajaxsort(Request $request) {
    $sortvalue = $request->input('sort');
    $categoryIds = $request->input('catid');

    $sortorder = 'asc';
    if ($sortvalue === 'high') {
        $sortorder = 'desc';
    }

    if ($sortvalue && $categoryIds && is_array($categoryIds)) {
       

        $products = DB::table('products')
            ->select('*')
            ->whereIn('product_category_id', $categoryIds)  // Use whereIn to filter by multiple category IDs
            ->orderBy('price', $sortorder)
            ->get();

            $productsData = $products->map(function ($product) {
                return [
                    'product' => $product,
                    'details_url' => route('front.details', ['id' => $product->id]),
                ];
            });

        return response()->json(['success' => true, 'data' => $productsData]);
    }
    //when no product_category is selected
   $products=DB::table('products')
   
   ->select('*')
   ->orderBy('price',$sortorder)
   ->get();

   $productsData = $products->map(function ($product) {
    return [
        'product' => $product,
        'details_url' => route('front.details', ['id' => $product->id]),
    ];
});

    return response()->json(['success' => true, 'data'=>$productsData]);
}



}
