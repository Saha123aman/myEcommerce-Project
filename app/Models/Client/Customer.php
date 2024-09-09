<?php

namespace App\Models\Client;
use App\Models\Cart;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Customer extends Authenticatable implements AuthenticatableContract
{
    use Notifiable;

        // Specify which attributes are mass assignable
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address','image_path',
    ];

    // Specify hidden attributes (like passwords)
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Specify attributes that should be cast to native types
    protected $casts = [
       
        'email_verified_at' => 'datetime',
        'is_customer' => 'boolean',
    ];
    public function carts()
    {
        return $this->hasMany(Cart::class, 'customer_id');
    }
}
