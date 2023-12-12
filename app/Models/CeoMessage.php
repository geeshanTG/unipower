<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CeoMessage extends Model
{
    use HasFactory;

    protected $table = 'ceo_messages';
    public $timestamps = true;


    protected $fillable = [
        'ceo_name',
        'position',
        'company_name',
        'ceo_image',
        'message',
    ];

}
