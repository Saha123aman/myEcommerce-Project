<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Customer;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'product_id', 'quantity'];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
