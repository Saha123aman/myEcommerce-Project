<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentcontroller;
use App\Models\Student;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Frontendcontroller;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Front\CategoryProductController;
use App\Http\Controllers\Admin\ProductCategory_controller;
use App\Http\Controllers\Front\Cartcontroller;
use App\Http\Controllers\Mail\Customermailcontroller;
use App\Http\Controllers\Front\NewsletterController;
use App\Http\Controllers\Front\Homecategorysectioncontroller;
// Route::get('session-test', function () {
//     return session()->all();
// });


// Route::post('form',[studentcontroller::class,'insert'])->name('insert_form');
// Route::get('fetch_data',[studentcontroller::class,'fetch']);
// Route::get('delete/{id}',[studentcontroller::class,'delete']);
// Route::get('edit/{id}',[studentcontroller::class,'edit_page']);
// Route::post('update_form/{id}',[studentcontroller::class,'update']);
Route::get('homepage',function(){
    return view('layouts.newfilter');

});
Route::get('listings',function(){
    return view('layouts.newnavbar');

});

Route::get('categorylisting',function(){
    return view('layouts.categorylisting');
});
Route::get('menlist',function(){
    return view('user.menproductlist');
});


Route::prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'login'])->name('login');
    Route::post('login', [AdminController::class, 'adminLogin'])->name('admin.login');
    Route::get('register', [AdminController::class, 'store'])->name('admin.registerForm');
    Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::post('register', [AdminController::class, 'adminstore'])->name('admin.register');

    


    Route::group(['middleware' => 'auth'], function () {
     
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('tablelist',[AdminController::class, 'tablelist'])->name('admin.tablelist');
    Route::get('getcustomer',[AdminController::class,'getcustomers'])->name('admin.getcustomers');
    Route::get('chart',function(){
    return view('admin.chart');
    })->name('admin.chart');

    //product section
    Route::get('productlist',[AdminProductController::class,'productlist'])->name('admin.product');

    Route::get('productform',[AdminProductController::class,'productform'])->name('admin.addproduct');
    Route::post('addproduct',[AdminProductController::class,'store'])->name('admin.productstore'); 
    Route::get('product/delete/{id}',[AdminProductController::class,'productdelete'])->name('admin.product.delete');
    Route::get('product/edit/{id}',[AdminProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('product/update/{id}',[AdminProductController::class, 'update'])->name('admin.product.update');

    //category section
    Route::get('category',[CategoryController::class,'categorylist'])->name('admin.categorylist');
    Route::get('addcategory',[CategoryController::class,'index'])->name('admin.categoryindex');
    Route::post('addcategory',[CategoryController::class,'store'])->name('admin.categoryStore');

    //product category
    Route::get('product/category',[ProductCategory_controller::class,'index'])->name('admin.productcategory');
    Route::post('product/category/store',[ProductCategory_controller::class,'store'])->name('admin.productcategory.store');
    Route::get('product/category/view',[ProductCategory_controller::class,'view'])->name('admin.productcategory.view');
    Route::delete('product/product-category/delete/{id}',[ProductCategory_controller::class,'destroy'])->name('admin.productcategory.delete');
    Route::get('product/product-category/edit/{id}',[ProductCategory_controller::class,'edit'])->name('admin.productcategory.edit');
    Route::put('product/product-category/update/{id}',[ProductCategory_controller::class,'update'])->name('admin.productcategory.update');
   
    

             });
});
//end of admin section



//start of user section
// Route::get('/', function () {
//     return view('user.home');
// })->name('front.home');
Route::get('/',[Homecategorysectioncontroller::class,'home'])->name('front.home');
Route::get('products',[ProductController::class,'index'])->name('front.products');
Route::get('aboutUs',[Frontendcontroller::class,'aboutus'])->name('front.about');
Route::get('contactus',[Frontendcontroller::class,'contactus'])->name('front.contact');
Route::get('category',[ProductController::Class,'category'])->name('front.category');
Route::get('details/{id}',[ProductController::class,'details'])->name('front.details');
Route::get('getproducts',[ProductController::class,'getproducts'])->name('productsget');
Route::get('showproducts',[ProductController::class,'showproducts'])->name('front.showproducts');
Route::get('search-product',[ProductController::class,'searchproductview'])->name('front.searchproducts');
Route::get('filter',[ProductController::class,'filter'])->name('front.filter');
Route::get('filterdata',[ProductController::class,'filterdata'])->name('front.filterdata');
Route::get('/menproductfilter',[ProductController::class,'menfilter'])->name('front.menproductfilter');


//product category section......
Route::get('product/mencategory',[CategoryProductController::class,'showmen'])->name('front.men.category');
Route::get('product/mencategory/get/{id}',[CategoryProductController::class,'getmen'])->name('front.men.getcategory');
Route::get('product/filter',[CategoryProductController::class,'filter'])->name('front.productfilter');
Route::get('product/ajaxfilter',[CategoryProductController::class, 'ajaxfilter'])->name('front.ajaxfilter');
Route::get('product/newajaxfilter',[CategoryProductController::class, 'newajaxfilter'])->name('front.newajaxfilter');
Route::get('product/newajaxsort',[CategoryProductController::class, 'newajaxsort'])->name('front.newajaxsort');


Route::get('product/womencategory',[CategoryProductController::class,'showwomen'])->name('front.women.category');
Route::get('product/womengetcategory/{id}',[CategoryProductController::class,'getwomen'])->name('front.women.getcategory');
// Route::get('test2',function(){
//     return view('user.test2');
// });

//----------------------------------------

// user authetication 
Route::get('login',[FrontendController::class,'loginView'])->name('user.login');
Route::post('login',[FrontendController::class,'login'])->name('user.loggedin');
Route::get('logout',[FrontendController::class,'logout'])->name('user.logout');
Route::get('user/signup',[FrontendController::class,'signup'])->name('signup');
Route::post('signup',[FrontendController::class,'store'])->name('user.store');
Route::get('forgotPassword',[FrontendController::class,'forgotPassword'])->name('forgotPassword');



Route::get('otp',function(){
    return view('user.registration.otp');
})->name('user.otp');
Route::get('verifyotp',function(){
    return view('user.registration.verifyotp');
})->name('user.verifyotp_view');

Route::post('sendotp',[FrontendController::class,'sendOTP'])->name('user.sendotp');
Route::post('verifyOTP',[FrontendController::class,'verifyOTP'])->name('user.verifyOTP');

//end of authentication


//user account section
Route::post('update',[FrontendController::class,'update'])->name('user.update');
Route::get('account',[FrontendController::class,'account'])->name('user.account');
Route::get('orders',[FrontendController::class,'orders'])->name('user.orders');
//end of account section


Route::group(['middleware' => 'custom'], function () {
    Route::get('/cart/view', [Cartcontroller::class,'viewcart'])->name('front.cart');
    Route::post('/cart/remove/{id}', [Cartcontroller::class,'removecart'])->name('front.remove');

    Route::post('/addtocart/{productid}',[Cartcontroller::class,'addtocart'])->name('front.addtocart');
    Route::post('newslettersubscribe',[NewsletterController::class, 'store'])->name('front.newsletter.store');


});


Route::post('/contact/send', [Customermailcontroller::class, 'send'])->name('contact.send');
Route::get('payment',function(){
   return view('user.account.payment');
});