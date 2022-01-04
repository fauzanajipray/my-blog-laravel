<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMenu extends Model
{
    use HasFactory; 

    protected $table = 'mainmenus';

    protected $fillable = [
        'id', 
        'title',
        'parent', 
        'category', 
        'content',
        'file',
        'url',
        'order',
        'status'
    ];

    public static $rules = [
        'title' => 'required',
        'category' => 'required',
        'file' => 'max:2048',
        'order' => 'required',
        'status' => 'required',
    ];

}
