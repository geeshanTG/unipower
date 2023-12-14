<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePageContent extends Model
{
    use HasFactory;

    protected $table = 'services_page_contents';
    public $timestamps = true;


    protected $fillable = [
        'heading'
    ];

}
