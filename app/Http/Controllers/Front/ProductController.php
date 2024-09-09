<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Adminmodel\Category;
use App\Models\Adminmodel\ProductCategory;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
    public function filterdata(Request $request)
    {
        if ($request->ajax()) {
            try {
                // Get input values from the request
                $catid = $request->input('catid');
                $typename = $request->input('typename');
                $priceRange = $request->input('priceRange'); // Assume 'priceRange' is either '+' or '-'
    
                // Build query to fetch products based on category id and typename
                $query = DB::table('products')
                    ->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
                    ->join('categories', 'product_categories.category_id', '=', 'categories.id')
                    ->select('products.*')
                    ->where('categories.id', $catid)
                    ->where('product_categories.name', $typename);
    
                // Apply sorting based on price range if it's provided
                if ($priceRange === '+') {
                    $query->orderBy('products.price', 'asc'); // Sort from low to high
                } elseif ($priceRange === '-') {
                    $query->orderBy('products.price', 'desc'); // Sort from high to low
                }
    
                // Execute the query and get the results
                $products = $query->get();
    
                // Fetch categories
                $categories = Category::all();
    
                // Render view and send as JSON response
                $result = view('user._productlist', compact('products', 'categories'))->render();
    
                return response()->json([
                    'success' => true,
                    'result' => $result
                ]);
    
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 500);
            }
        }
    }
    
    
    public function index(Request $request)
    {

      
        // Handle non-AJAX request
        $products = Product::all();
        $categories = Category::all();
    
        return view('user.productsList', compact('products', 'categories'));
    }
    


        public function category(){
            return view('user.category');
        }
        public function details($id){
          
      
            $customer = Auth::guard('custom')->user();
    
          if(!$customer){
            $product = Product::findOrFail($id);

            $similarProducts = Product::where('id', '!=', $id)->paginate(4);
            
            $alreadyInCart = false;
       

        return view('user.productdetails',[
            'product'=>$product,
            'alreadyInCart'=> $alreadyInCart,
            'similarProducts'=>$similarProducts,
        ]
    
   );
}else{
    $product = Product::findOrFail($id);

    $cartItem = Cart::where('customer_id', $customer->id)  //check product exist or not in cart
    //then send alreadyInCart false   
    ->where('product_id',$id)
    ->first();
    if($cartItem){
        // $alreadyInCart =false;


        $similarProducts = Product::where('id', '!=', $id)->paginate(4);
    // $alreadyInCart =true;
    return view('user.productdetails',[
        'product'=>$product,
        'alreadyInCart'=>true,
        'similarProducts'=>$similarProducts,
    ]);

    }

    // $similarProducts = Product::where('id', '!=', $id)->paginate(4);
    $productCategoryId = DB::table('products')->where('id', $id)->value('product_category_id');

    $similarProducts = DB::table('products')
        ->where('id', '!=', $id)
        ->where('product_category_id', $productCategoryId)
        ->paginate(4);


    // $alreadyInCart =true;
    return view('user.productdetails',[
        'product'=>$product,
        'alreadyInCart'=>false,
        'similarProducts'=>$similarProducts,
    ]);
}
    
        //   }else{
              
        //     $cartItem = Cart::where('customer_id', $customer->id)
        //     ->where('product_id', $productId)
        //     ->first();

            
        
        //     $product = Product::findOrFail($id);
         
        //     // Do not update quantity if already in cart
        //     $alreadyInCart = true;
        // } else {
        //     // Add new item to the cart with quantity 1
        //     Cart::create([
        //         'customer_id' => $customer->id,
        //         'product_id' => $productId,
        //         'quantity' => 1,
        //     ]);
        //     $alreadyInCart = false;
        // }
        // $similarProducts = Product::where('id', '!=', $id)->paginate(4);
        // return response()->json([
        //     'success' => true,
        //     'newCartCount' => Cart::where('customer_id', $customer->id)->sum('quantity'),
        //     'alreadyInCart' => $alreadyInCart
        // ]);
        //   }
        

    }

//for search button
   
public function showproducts(Request $request)
{
    try {
        if ($request->ajax()) {
            $searchTerm = $request->input('search', '');

            if (empty($searchTerm)) {
                \Log::debug('Search term is empty.');
                return response()->json(['success' => false, 'data' => [], 'message' => 'Search term cannot be empty']);
            }

            $category = ProductCategory::where('name', 'like', $searchTerm . '%')->first();

            if (!$category) {
                \Log::debug('Category not found for search term: ' . $searchTerm);
                return response()->json(['success' => false, 'data' => [], 'message' => 'Category not found']);
            }

            $products = DB::table('products')
                ->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
                ->select('products.*')
                ->where('products.product_category_id', $category->id)
                ->get();

            if ($products->isNotEmpty()) {
                return response()->json(['success' => true, 'data' => $products]);
            } else {
                return response()->json(['success' => false, 'data' => [], 'message' => 'No products found']);
            }
        }
    } catch (\Exception $e) {
        \Log::error('Error occurred: ' . $e->getMessage());
        return response()->json(['success' => false, 'data' => [], 'message' => 'An error occurred', 'error' => $e->getMessage()]);
    }
}

    public function searchproductview(Request $request)
    {
        try {
            $categories=Category::get();
            // Retrieve the search term from the request
            $searchTerm = $request->input('search', '');
            // dump($categories);
            // die;

    
            // Query products based on the search term
            $category=ProductCategory::where('name','like',$searchTerm.'%')->first();
            
           
               $products=DB::table('products')
               ->join('product_categories','products.product_category_id','=','product_categories.id')

               ->select('products.*')
               ->where('products.product_category_id',$category->id)
              ->get();

            $categoryName=ProductCategory::where('name','like',$searchTerm.'%')->value('name');
            // dd($categoryName);
    // dump($products);
    // die;
            // Check if products are found
            if ($products->count() > 0) {
                $productcount = $products->count();
                return view('user.searchproductview', [
                    'products' => $products,
                    'search' => $searchTerm,
                    'productcount' => $productcount,
                    'categories'=>$categories,
                    'categoryName'=>$categoryName,
                    
                ]);
            } else {
                return view('user.searchproductview', [
                    'error' => 'No products available!',
                    'search' => $searchTerm,
                    'categories'=>$categories,
                    'products' => $products,
                    'categoryName'=>$categoryName,
                   
                ]);
            }
        } catch (\Exception $e) {
            // Handle exceptions if any occurred
            return view('user.searchproductview', [
                'error' => 'Error fetching products: ' . $e->getMessage(),
                'error' => 'No products available!',
                'search' => $searchTerm,
                'categories'=>$categories,
              
               
            ]);
        }
    }
    

    
//for li items
    public function getproducts(Request $request) {
        // Retrieve the value from the 'value' parameter sent via AJAX
        $searchTerm = $request->input('value');
    
                                   // Perform the search query using the retrieved search term
       $category=ProductCategory::where('name','like',$searchTerm.'%')->first();

       if($category){

        $products=Product::where('product_category_id',$category->id)->get();
       }else{
         $products=collect();
       }
    
        // Return the search results as JSON
        return response()->json(['success' => true, 'data' => $products]);
    }

   

    public function filter(Request $request){
             $id=$request->input('value');
        $categories = DB::table('categories')
        ->join('product_categories', 'categories.id', '=', 'product_categories.category_id')
        ->select('categories.name as category_name', 'product_categories.name as product_pname')
        ->where('product_categories.category_id', '=', $id)
        // ->distinct('product_type')
        // ->orderBy('product_type')
        ->get();

    return response()->json(['success'=>true,'data'=>$categories]);


    }


    
    
   
    public function menfilter(Request $request)
{
    try {
        // $query=Product::query();
        $name=$request->input('categoryName');
        $priceOrder = $request->input('price');
        $pcatname=ProductCategory::where('name',$name)->first();
      
        //$productid=Product::where('product_category_id',$pcatname->id)->get();



         // Handle price sorting if needed
         if ($priceOrder === 'low-to-high') {
            $products=DB::table('products')
            ->join('product_categories','product_categories.id','=','products.product_category_id')
            ->select('products.*')
            ->where('products.product_category_id',$pcatname->id)
            ->orderBy('price','asc')
            ->get();
  
         
            $productsWithUrls = $products->map(function ($product) {
                return [
                    'product' => $product,
                    'details_url' => route('front.details', ['id' => $product->id]),
                ];
            });
        
            return response()->json([
                'success' => true,
                'products' => $productsWithUrls,
            ]);
           
        } else {
            $products=DB::table('products')
            ->join('product_categories','product_categories.id','=','products.product_category_id')
            ->select('products.*')
            ->where('products.product_category_id',$pcatname->id)
            ->orderBy('price','desc')
            ->get();
            // $html= view('user.filtermenproduct', compact('products'))->render();
            // return response()->json([
            //     'success' => true,
            //     'data' => $html
            // ]);

          
            $productsWithUrls = $products->map(function ($product) {
                return [
                    'product' => $product,
                    'details_url' => route('front.details', ['id' => $product->id]),
                ];
            });
        
            return response()->json([
                'success' => true,
                'products' => $productsWithUrls,
            ]);
           
        }
       
        // Get the selected category from the request (single value)
       
       
        // $colors = $request->input('color', []);

        // Fetch the category details based on the selected category
       // $category = ProductCategory::where('name', $category)->first();
    
 
        // if (!$category) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Category not found'
        //     ], 404);
        // }

       // $categoryId = $category->id;

        // Initialize the query for products based on the category ID
       // $query = Product::where('product_category_id', $categoryId);

       

        // // Apply color filtering if needed
        // if (!empty($colors)) {
        //     $query->whereIn('color', $colors);
        // }

       

     
    } catch (\Exception $e) {
        \Log::error('Error fetching products: ' . $e->getMessage());

        return response()->json([
            'success' => false,
            'message' => 'An error occurred'
        ], 500);
    }
}

    
    
 }

 // return view('partials.product-list', compact('products'))->render();