<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = "sliders";

    protected $fillable = [
        'title',
        'image',
        'url',
        'order',
        'status'
    ];

    public static $rules = [
        'title' => 'required|string|max:100',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'url' => 'required|string|max:50',
        'order' => 'required|integer',
        'status' => 'required|integer'
    ];


}
