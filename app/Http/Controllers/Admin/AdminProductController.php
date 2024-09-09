<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adminmodel\Category;
use App\Models\Product;
use App\Models\Adminmodel\ProductCategory;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    public function productlist(Request $request) {
        try {
            if ($request->ajax()) {

                $filterdata=$request->input('filtedata', '');
                if(!empty($filterdata)){
                  
                    if($filterdata==='newest'){

                        $products=DB::table('products')
                        ->join('product_categories','product_categories.id','=','products.product_category_id')
                        ->select('products.*')
                        ->orderBy('products.id','desc')
                        ->get();
                        return response()->json(['success'=>true,'data'=>$products]);
                    }else{
                        $products=DB::table('products')
                        ->join('product_categories','product_categories.id','=','products.product_category_id')
                        ->select('products.*')
                        ->orderBy('products.id','asc')
                        ->get();
                        return response()->json(['success'=>true,'data'=>$products]);
                    }

                }
                $searchterm = $request->input('data', '');
    
                if (empty($searchterm)) {
                    // Return all products when search term is empty
                    $products = Product::all();
                    return response()->json(['success' => true, 'data' => $products]);
                }
    
                $pcatname = ProductCategory::where('name', 'like', $searchterm . '%')->first();
    
                if (!$pcatname) {
                    // Return empty data set if no category found
                    return response()->json([
                        'success' => true,
                        'message' => 'No products found for the given search term',
                        'data' => []
                    ]);
                }
    
                $products = DB::table('products')
                    ->join('product_categories', 'product_categories.id', '=', 'products.product_category_id')
                    ->select('products.*')
                    ->where('products.product_category_id', $pcatname->id)
                    ->get();
    
                return response()->json(['success' => true, 'data' => $products]);
    
            }
    
            $products = DB::table('products')
            ->select('*')
            ->orderBy('id','desc')
            ->get();
            return view('admin.product', compact('products'));
    
        } catch (\Exception $e) {
            \Log::error('Error fetching products: ' . $e->getMessage());
    
            return response()->json([
                'success' => false,
                'message' => 'An error occurred'
            ], 500);
        }
    }
    
    
    
    public function productform(){
        $productcategory=ProductCategory::get();
        return view('admin.productform',compact('productcategory'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'product_availability'=>'required',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_category_id'=>'required',
        ]);
    
        $product = new Product();
        $imageName = null;
    
        if ($request->hasFile('image_url')) {     //if image exist
            $image = $request->file('image_url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('productimages'), $imageName);
            $product->image_url = $imageName;

            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->product_availability = $request->product_availability;
        }
    
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->product_availability = $request->product_availability;
        $product->image_url = $imageName;
        
        $product->product_category_id =$request->product_category_id ;
        
        
    
        $result = $product->save();
    
        if ($result) {
            return redirect()->route('admin.product')->with('success', 'Product added successfully');
        } else {
            return back()->with('fail', 'Product not added');
        }
    }

    public function productdelete(Request $request,$id){
       
        if( $request->ajax()){
            try {
                $product = Product::findOrFail($id);
                $product->delete();
                
                return response()->json(['success' => true]);
            } catch (\Exception $e) {
                \Log::error('Error fetching products: ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => 'Error deleting product'], 500);
            }
         }
    
     Product::findOrfail($id)->delete();
      return back();
    
}
public function edit($id){
  
        $product=Product::find($id);
        $productcategory=ProductCategory::get();
      

        return view('admin.updateproduct',compact('product','productcategory'));
       

       
}
public function update(Request $request,$id){
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'product_availability'=>'required',
        'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'product_category_id'=>'required',
    ]);

    $product=Product::findOrfail($id);
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    
    $product->product_availability = $request->input('product_availability');
    $product->product_category_id = $request->input('product_category_id');
     
    if($request->hasFile('image_url')){
    $image=$request->hasFile('image_url');
    $imageName=time().'.'.$image->getClientOriginalExtension();
    $image->move(public_path('productimages'),$imageName);
    

    //delete the old image if it exists
    if ($product->image_url && file_exists(public_path('productimages/'.$product->image_url))) {
        unlink(public_path('productimages/'.$product->image_url));
    }
    $product->image_url = $imageName;

}else{

    $product->image_url = $request->input('existing_image_url');
    }

    $product->save();

    return to_route('admin.product')->with('success','updated successfully');
}

     
    
    }
    

