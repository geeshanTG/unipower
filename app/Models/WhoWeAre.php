<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhoWeAre extends Model
{
    use HasFactory;

    protected $table = 'who_we_are';
    public $timestamps = true;


    protected $fillable = [
        'heading',
        'description_1',
        'description_2',
        'image_1',
        'image_2',
        'image_3',
    ];

}
