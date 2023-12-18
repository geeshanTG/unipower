<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTrustedPartner extends Model
{
    use HasFactory;

    protected $table = 'our_trusted_partners';
    public $timestamps = true;


    protected $fillable = [
        'image',
        'order',
        'status',
        'is_delete'
    ];

}
