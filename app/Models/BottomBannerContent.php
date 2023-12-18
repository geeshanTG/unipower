<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BottomBannerContent extends Model
{
    use HasFactory;

    protected $table = 'bottom_banner_contents';
    public $timestamps = true;


    protected $fillable = [
        'heading',
        'description'
    ];

}
