<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // menampilkan semua data
    public function index(){
        $data = Category::get();
        $title = 'Category';
        return view('admin.category.index', compact('data', 'title'));
    }

    // menampilkan halaman create
    public function create(){
        $title = 'Category';
        return view('admin.category.create', compact('title'));
    }

    // manambahkan data
    public function postCreate(Request $request){
        $request->validate(Category::$rules);
        $requests = $request->all();
        $requests['image'] = "";
        if ($request->hasFile('image')) {
            $files = Str::random(20).'.'.$request->image->getClientOriginalName();
            $request->file('image')->move("file/category/", $files);
            $requests['image'] = "file/category/".$files;
        }

        $category = Category::create($requests);
        if($category){
            return redirect('admin/category')->with('status', 'Berhasil menambahkan data!');
        }
        return redirect('admin/category/create')->with('status', 'Gagal menambahkan data!');
    }


    // menampilkan halaman edit
    public function edit($id){
        $data = Category::find($id);
        $title = 'Category';
        return view('admin.category.edit', compact('data', 'title'));
    }

    // mengupdate data
    public function postEdit(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::find($id);
        if($category == null){
            return redirect('admin/category')->with('status', 'Data tidak ditemukan!');
        }

        $req = $request->all();
        
        if ($request->hasFile('image')) {
            if ($category->image != "" || $category->image !== null) {
                File::delete($category->image);
            }
            $files = Str::random(20).'.'.$request->image->getClientOriginalName();
            $request->file('image')->move("file/category/", $files);
            $req['image'] = "file/category/".$files;
        }

        $update = $category->update($req);

        if($update){
            return redirect('admin/category')->with('status', 'Berhasil mengupdate data!');
        }
        return redirect('admin/category/edit/'.$id)->with('status', 'Gagal mengupdate data!');
    }

    // menghapus data
    public function delete($id){
        $category = Category::find($id);
        if($category == null){
            return redirect('admin/category')->with('status', 'Data tidak ditemukan!');
        }
        if($category->image != "" || $category->image !== null) {
            File::delete($category->image);
        }
        $delete = $category->delete();
        if($delete){
            return redirect('admin/category')->with('status', 'Berhasil menghapus data!');
        }
        return redirect('admin/category')->with('status', 'Gagal menghapus data!');
    }


}
