<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class Cartcontroller extends Controller
{
    public function cart(Request $request){
      

        return view('user.addtocart');
    }
    public function removecart(Request $request,$id){
        if ($request->ajax()) {
           

            $item = Cart::findOrFail($id);
            $item->delete();

            // Calculate the updated cart count
            $customer = Auth::guard('custom')->user();
            if ($customer) {
                $cartCount = Cart::where('customer_id', $customer->id)->sum('quantity');
            } else {
                $cartCount = 0;
            }

            return response()->json(['success' => true, 'cartCount' => $cartCount]);
        }

        return response()->json(['success' => false, 'message' => 'Request not valid.']);
    }


    public function addtocart(Request $request, $productId)
    {
        try {
            $customer = Auth::guard('custom')->user();
            if (!$customer) {
                \Log::debug('error: No authenticated customer');
                return response()->json(['success' => false, 'message' => 'You must be logged in to add items to your cart.']);
            }
    
            $product = Product::findOrFail($productId);
            $cartItem = Cart::where('customer_id', $customer->id)->where('product_id', $productId)->first();
    
            if ($cartItem) {
                $alreadyInCart = true;
            } else {
                Cart::create([
                    'customer_id' => $customer->id,
                    'product_id' => $productId,
                    'quantity' => 1,
                ]);
                $alreadyInCart = false;
            }
    
            return response()->json([
                'success' => true,
                'newCartCount' => Cart::where('customer_id', $customer->id)->sum('quantity'),
                'alreadyInCart' => $alreadyInCart
            ]);
    
        } catch (\Exception $e) {
            \Log::error('Exception occurred: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['success' => false, 'message' => 'An error occurred.']);
        }
    }
    
    
        public function viewcart(){

          
    
        // Use the custom guard to get the authenticated customer
        $customer = Auth::guard('custom')->user();

        if (!$customer) {
            return redirect()->route('login')->with('error', 'Please log in to view your cart.');
        }

        // Retrieve the cart items for the logged-in customer
        $cartItems = Cart::where('customer_id', $customer->id)
                         ->with('product')
                         ->orderBy('id','desc') // Eager load product details
                         ->get();


                        //  dump($cartItems);
                        //  die;
        // Pass cart items to the view
        return view('user.addtocart', ['cartItems' => $cartItems]);
    }
        }
    

