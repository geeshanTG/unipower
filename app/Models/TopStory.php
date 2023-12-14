<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopStory extends Model
{
    use HasFactory;

    protected $table = 'top_stories';
    public $timestamps = true;


    protected $fillable = [
        'top_story_news_1',
        'top_story_news_2'
    ];

}
