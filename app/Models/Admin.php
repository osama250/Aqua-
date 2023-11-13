<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $fillable = ['name', 'email', 'password'];

    static $rules = [
        'name'      => 'required|string|min:5|max:255',
        'email'     => 'required|email',
        'password'  => 'required|min:8|same:confirm-password',
        'role'      => 'required|exists:roles,id|not_in:1',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function role()   // One To Many
    {
        return $this->belongsTo( Role::class , 'role_id' );
    }
}
