<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundTax extends Model
{
    protected $fillable = [
        'department_name',
        'tax_allocated'
    ];
}
