<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class ViewServiceProvider extends ServiceProvider
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
        
            // Share cart count with all views
            View::composer('*', function ($view) {
                $customer = Auth::guard('custom')->user();
        
                if ($customer) {
                    $cartCount = Cart::where('customer_id', $customer->id)
                                     ->sum('quantity');
                } else {
                    $cartCount = 0;
                }
        
                $view->with('cartCount', $cartCount);
            });
        }
    
}
