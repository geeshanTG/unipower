<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurStory extends Model
{
    use HasFactory;

    protected $table = 'our_stories';
    public $timestamps = true;


    protected $fillable = [
        'year',
        'heading',
        'image',
        'description',
        'order',
        'status',
        'is_delete',
    ];

}
