<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurCoreProduct extends Model
{
    use HasFactory;

    protected $table = 'our_core_products';
    public $timestamps = true;


    protected $fillable = [
        'main_category_id_1',
        'main_category_id_2',
        'main_category_id_3'
    ];

}
