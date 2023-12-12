<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;
    protected $table = 'product_subcategory';
    public $timestamps = true;
    protected $fillable = ['name', 'urlname', 'category_id', 'status', 'is_delete',];
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class,'category_id');
    }
}
