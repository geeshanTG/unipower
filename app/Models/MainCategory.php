<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;

    protected $table = 'main_categories';
    public $timestamps = true;


    protected $fillable = [
        'heading',
        'image',
        'order',
        'status',
        'is_delete',
    ];

}
