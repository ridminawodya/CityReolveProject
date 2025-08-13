<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'contact_no', 'category', 'description', 'location', 'photo'];
}
