<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    public $table = 'contact_us';

    public $fillable = [
        'name',
        'email',
        // 'phone',
        'title',
        'subject'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        // 'phone' => 'string',
        'title' => 'string',
        'subject' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string',
        'email' => 'required|email',
        // 'phone' => 'required|string|min:11|max:11|regex:/\d{11}/',
        'title' => 'required|string|min:3',
        'subject' => 'required|string|min:5|max:255'
    ];


}
