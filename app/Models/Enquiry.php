<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    protected $table = 'enquiry_details';
    public $timestamps = true;
    protected $fillable = ['name', 'email', 'phone', 'subject', 'message', 'status', 'is_delete'];
}
