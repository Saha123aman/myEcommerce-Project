<?php

namespace App\Http\Controllers\Admin;
use App\Models\Adminmodel\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CategoryController extends Controller
{
    public function category(){
        return view('admin.addcategory');
    }
    public function categorylist(){
        $categories = Category::all();
        return view('admin.categorylist', compact('categories'));

    }
    public function index(){
            
       
            return view('admin.addcategory');
       
    }
    public function store(Request $request){
            $request->validate([
                'name'=>'required'
                
            ]);

            Category::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'created_at' => Carbon::now()->setTimezone('UTC')->format('Y-m-d H:i:s') // or your desired timezone
            
            ]);

        return redirect()->route('admin.categoryindex')->with('success', 'Category created successfully');
    }
}
