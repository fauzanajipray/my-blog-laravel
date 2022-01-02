<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
     //menampilkan semua data
     public function index(){
          $data = Post::get();
          $title = 'Post';
          return view('admin.post.index', compact('data', 'title'));
     } 

     //menampilkan halaman create
     public function create(){
          $title = 'Post';
          $categories = Category::get();
          return view('admin.post.create', compact('title', 'categories'));
     }

     //manambahkan data


}
