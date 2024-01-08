<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    public $timestamps = true;


    protected $fillable = [
        'main_category_id',
        'sub_category_id',
        'heading',
        'sub_heading',
        'description',
        'image',
        'brochure',
        'order',
        'status',
        'is_delete',
        'slug',
    ];

}
