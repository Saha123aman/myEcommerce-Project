<?php

namespace App\Models\Adminmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
protected $tablename="product_categories";

    protected $fillable = ['name', 'category_image','startingprice_or_discount','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
