<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiddleBannerContent extends Model
{
    use HasFactory;

    protected $table = 'middle_banner_contents';
    public $timestamps = true;


    protected $fillable = [
        'count_1',
        'heading_1',
        'count_2',
        'heading_2',
        'count_3',
        'heading_3',
        'count_4',
        'heading_4',
    ];

}
