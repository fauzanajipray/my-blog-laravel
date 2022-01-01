<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // menampilkan semua data
    public function index(){
        $data = Category::get();
        return view('admin.category.index', compact('data'));
    }
}
