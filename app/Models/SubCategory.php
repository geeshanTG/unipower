<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';
    public $timestamps = true;


    protected $fillable = [
        'main_category_id',
        'heading',
        'order',
        'status',
        'is_delete',
    ];

}
