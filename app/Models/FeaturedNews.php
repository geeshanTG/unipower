<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedNews extends Model
{
    use HasFactory;

    protected $table = 'featured_news';
    public $timestamps = true;


    protected $fillable = [
        'featured_news_1',
        'featured_news_2',
        'featured_news_3'
    ];

}
