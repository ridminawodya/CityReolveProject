<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'department_id',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationship with Department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Scope for active users
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Scope for inactive users
    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    // Check if user is admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Check if user is manager
    public function isManager()
    {
        return $this->role === 'manager';
    }
}