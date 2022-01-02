<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title', 'thumbnail', 'content', 'category_id', 'is_headline', 'status'
    ];

    public $rules = [
        'title' => 'required',
        'thumbnail' => 'required',
        'content' => 'required',
        'category_id' => 'required',
        'is_headline' => 'required',
        'status' => 'required',
    ];
}
