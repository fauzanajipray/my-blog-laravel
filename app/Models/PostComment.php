<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    protected $table = 'post_comments';

    protected $fillable = [
        'post_id', 'name', 'email', 'comment'
    ];

    public static $rules = [
        'post_id' => 'required',
        'name' => 'required',
        'email' => 'required',
        'comment' => 'required'
    ];
}
