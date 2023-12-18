<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryInsight extends Model
{
    use HasFactory;

    protected $table = 'industry_insights';
    public $timestamps = true;


    protected $fillable = [
        'news_id_1',
        'news_id_2',
        'news_id_3',
        'news_id_4'
    ];

}
