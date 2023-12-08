<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaTag extends Model
{
    use HasFactory;

    protected $table = 'meta_tags';
    public $timestamps = true;


    protected $fillable = [
        'image',
        'order',
        'status',
        'is_delete'
    ];

}
