<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = 'product_category';
    public $timestamps = true;
    protected $fillable = ['name', 'urlname', 'image', 'status', 'is_delete', 'order'];
    public function productSubCategories()
    {
        return $this->hasMany(ProductSubCategory::class,'category_id');
    }
}
