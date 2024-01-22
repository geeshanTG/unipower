<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurService extends Model
{
    use HasFactory;

    protected $table = 'our_services';
    public $timestamps = true;


    protected $fillable = [
        'service_id_1',
        'service_id_2',
        'service_id_3',
        'service_id_4',
        'service_id_5'
    ];

}
