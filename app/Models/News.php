<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    public $timestamps = true;


    protected $fillable = [
        'heading',
        'news_date',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'description',
        'status',
        'is_delete',
    ];

}
