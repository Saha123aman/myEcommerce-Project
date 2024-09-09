<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adminmodel\Category;
use App\Models\Adminmodel\ProductCategory;
use Illuminate\Support\Facades\DB;

class ProductCategory_controller extends Controller
{
    public function index(){
        $categories=Category::all();

        return view('admin.productcategoryform',compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
           
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id'=>'required',
        ]);
    
        $ProductCategory = new ProductCategory();
        $imageName = null;
    
        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('categoryimages'), $imageName);
            $ProductCategory->category_image = $imageName;
        }
    
        $ProductCategory->name = $request->name;
       
        $ProductCategory->category_image = $imageName;
        $ProductCategory->startingprice_or_discount=$request->startingprice_or_discount;
        $ProductCategory->category_id = $request->category_id;
        
    
        $result = $ProductCategory->save();
        if($result){
            return redirect()->route('admin.productcategory.view')->with('success','inserted successfully');
        }
    
        // if ($result) {
        //     return redirect()->route('admin.product')->with('success', 'Product added successfully');
        // } else {
        //     return back()->with('fail', 'Product not added');
        // }
    }
    public function view(Request $request){

        if($request->ajax()){
            
            $searchdataid=$request->input('searchdata');

            $product=DB::table('product_categories')
            ->join('categories','categories.id','=','product_categories.category_id')
            ->select('product_categories.*','categories.name as categoryname')
            ->where('product_categories.category_id', $searchdataid)

            ->orderBy('product_categories.name')
            ->get();
           return response()->json(['success'=>true,
           'data'=>$product
        ]);

        }
        // $ProductCategories = ProductCategory::all();

        $ProductCategories=DB::table('product_categories')
        ->join('categories','product_categories.category_id','=','categories.id')
        ->select('product_categories.*','categories.name as categoryname')
        ->get();

        //  $categories=Category::all();
        return view('admin.showproductcategory',compact('ProductCategories'));
    }

    public function destroy(Request $request,$id){
        if( $request->ajax()){
            try {
                $product = Productcategory::findOrFail($id);
                $product->delete();
                
                return response()->json(['success' => true]);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Error deleting product'], 500);
            }
         }
         ProductCategory::findOrfail($id)->delete();
         return back();
    }
    public function edit($id)
    {
        // Find the product category by ID
        $procat = ProductCategory::findOrFail($id);
    
        // Retrieve the category associated with this product category
        $category = Category::findOrFail($procat->category_id); // Assuming `category_id` exists in ProductCategory
        // $catid = $category->id;
         
        // dump($category); // This will show the category details
        // die;
    
        return view('admin.procategory_edit', compact('procat', 'category'));
    }

    public function update(Request $request,$id){
        
       

        $request->validate([
            'name' => 'required',
           
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id'=>'required',
        ]);
    
       
        $product=ProductCategory::findOrfail($id);
  
        $product->name = $request->name;
       
       
        $product->startingprice_or_discount=$request->startingprice_or_discount;
        $product->category_id = $request->category_id;
     
    if($request->hasFile('category_image')){
    $image=$request->hasFile('category_image');
    $imageName=time().'.'.$image->getClientOriginalExtension();
    $image->move(public_path('categoryimages'),$imageName);
    

    //delete the old image if it exists
    if ($product->category_image && file_exists(public_path('categoryimages/'.$product->category_image))) {
        unlink(public_path('categoryimages/'.$product->category_image));
    }
    $product->category_image = $imageName;

}else{

    $product->category_image = $request->input('existing_image_url');
    }

    $product->save();

    return to_route('admin.productcategory.view')->with('success','product category updated successfully');

    }
    
   
}
