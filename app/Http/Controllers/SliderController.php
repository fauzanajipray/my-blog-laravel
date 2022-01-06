<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{    
    //menampilkan semua data
    public function index(){
        $data = Slider::orderBy('order', 'asc')->get();
        $title = 'Slider';
        return view('admin.slider.index', compact('data', 'title'));
    }

    //menampilkan halaman create
    public function create(){
        $title = 'Slider';
        return view('admin.slider.create', compact('title'));
    }

    //manambahkan data
    public function postCreate(Request $request){
        $this->validate($request, Slider::$rules);

        $slider = new Slider;
        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->order = $request->order;
        $slider->status = $request->status;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::random(20) . '.' . $file->getClientOriginalName();
            $destinationPath = "file/slider/";
            $file->move($destinationPath, $filename);
            $slider->image = $destinationPath.$filename;
        }

        $cek = Slider::create($slider->toArray());
        if($cek){
            return redirect('admin/slider')->with('status', 'Berhasil menambahkan data!');
        }

        return redirect('admin/slider/create')->with('status', 'Gagal menambahkan data!');
    }

    //menampilkan halaman edit
    public function edit($id){
        $data = Slider::find($id);
        $title = 'Slider';
        return view('admin.slider.edit', compact('data', 'title'));
    }

    //mengupdate data
    public function postEdit(Request $request, $id){
        $this->validate($request, Slider::$rules);

        $slider = Slider::find($id);
        if($slider == null){
            return redirect('admin/slider')->with('status', 'Data tidak ditemukan!');
        }

        $req = $request->all();

        if($request->hasFile('image')){
            if($slider->image != null || $slider->image != ''){
                File::delete($slider->image);
            }

            $file = $request->file('image');
            $filename = Str::random(20) . '.' . $file->getClientOriginalName();
            $destinationPath = "file/slider/";
            $file->move($destinationPath, $filename);
            $req['image'] = $destinationPath.$filename;
        }

        $update = $slider->update($req);
        if($update){
            return redirect('admin/slider')->with('status', 'Berhasil mengupdate data!');
        }
        return redirect('admin/slider/edit/'.$id)->with('status', 'Gagal mengupdate data!');
    }

    public function delete($id){
        $slider = Slider::find($id);
        if($slider == null){
            return redirect('admin/slider')->with('status', 'Data tidak ditemukan!');
        }
        if($slider->image != "" || $slider->image !== null){
                File::delete($slider->thumbnail);
        }
        $delete =$slider->delete();
        
        if($delete){
            return redirect('admin/slider')->with('status', 'Berhasil menghapus data!');
        }
        return redirect('admin/slider')->with('status', 'Gagal menghapus data!');
    }
    
}
