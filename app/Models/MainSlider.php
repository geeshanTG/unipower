<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainSlider extends Model
{
    use HasFactory;

    protected $table = 'main_sliders';
    public $timestamps = true;


    protected $fillable = [
        'heading',
        'sub_heading',
        'icon',
        'desktop_image',
        'mobile_image',
        'order',
        'status',
        'is_delete',
    ];

}
