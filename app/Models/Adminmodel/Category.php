<?php

namespace App\Models\Adminmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $tablename="categories";
    protected $fillable = ['name', 'description'];

    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }
    public function productCategories()
    {
        return $this->hasMany(ProductCategory::class);
    }
}
