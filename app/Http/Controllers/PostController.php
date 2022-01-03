<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;   
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
     //menampilkan semua data
     public function index(){
          $data = Post::get();
          $categories = Category::get();
          $title = 'Post';
          return view('admin.post.index', compact('data', 'title', 'categories'));
     } 

     //menampilkan halaman create
     public function create(){
          $title = 'Post';
          $categories = Category::get();
          return view('admin.post.create', compact('title', 'categories'));
     }

     //manambahkan data
     public function postCreate(Request $request){
          $this->validate($request, Post::$rules);

          $post = new Post;
          $post->title = $request->title;
          $post->content = $request->content;
          $post->category_id = $request->category_id;
          

          if ($request->hasFile('thumbnail')) {
               $file = $request->file('thumbnail');
               $filename = Str::random(20) . '.' . $file->getClientOriginalName();
               $destinationPath = "file/post/";
               $file->move($destinationPath, $filename);
               $post->thumbnail = $destinationPath.$filename;
          }

          $cek = Post::create($post->toArray());
          if($cek){
               return redirect('admin/post')->with('status', 'Berhasil menambahkan data!');
          }

          return redirect('admin/post/create')->with('status', 'Gagal menambahkan data!');
     }

     //menampilkan halaman edit
     public function edit($id){
          $data = Post::find($id);
          $title = 'Post';
          $categories = Category::get();
          return view('admin.post.edit', compact('data', 'title', 'categories'));
     }
     
     //menghapus data
     public function delete($id){
          $post = Post::find($id);
          if($post == null){
               return redirect('admin/post')->with('status', 'Data tidak ditemukan!');
          }
          $post->delete();
          return redirect('admin/post')->with('status', 'Berhasil menghapus data!');
     }

}
