<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurValue extends Model
{
    use HasFactory;

    protected $table = 'our_values';
    public $timestamps = true;


    protected $fillable = [
        'heading',
        'icon',
        'description',
        'order'
    ];

}
