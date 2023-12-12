<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;
    protected $table = 'contact_info';
    public $timestamps = true;
    protected $fillable = [
        'heading_title',
        'description',
        'address',
        'phone_number_1',
        'phone_number_2',
        'email',
    ];
}
