<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionMission extends Model
{
    use HasFactory;

    protected $table = 'vision_mission';
    public $timestamps = true;


    protected $fillable = [
        'vision_heading',
        'mission_heading',
        'vision_description',
        'mission_description',
    ];

}
