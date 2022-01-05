<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];

    public static $rules = [
        'name' => 'required|string|max:50',
        'email' => 'required|string|max:50',
        'subject' => 'required|string|max:50',
        'message' => 'required|string',
    ];
}
