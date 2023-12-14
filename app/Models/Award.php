<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    protected $table = 'awards';
    public $timestamps = true;


    protected $fillable = [
        'heading',
        'description',
        'award_name_1',
        'award_image_1',
        'award_name_2',
        'award_image_2',
        'image'
    ];

}
