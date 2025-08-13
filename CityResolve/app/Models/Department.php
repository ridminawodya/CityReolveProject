<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    // Relationship with Users
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Scope for active departments
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Get active users count
    public function getActiveUsersCountAttribute()
    {
        return $this->users()->where('status', 'active')->count();
    }

    // Get total users count  
    public function getTotalUsersCountAttribute()
    {
        return $this->users()->count();
    }
}