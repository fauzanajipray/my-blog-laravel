<?php

namespace App\Http\Controllers;

use App\Models\MainMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MainMenuController extends Controller
{
    //menampilkan data
    public function index(){
        $data = MainMenu::orderBy('order', 'asc')->get();
        $title = 'Main Menu';
        return view('admin.mainmenu.index', compact('data', 'title'));

    }

    //menampilkan form tambah data
    public function create(){
        $title = 'Main Menu';
        $data = MainMenu::get();
        return view('admin.mainmenu.create', compact('title', 'data'));
    }

    //menambahkan data
    public function postCreate(Request $request){
        $request->validate(MainMenu::$rules);
        $requests = $request->all();

        $requests['file'] = "";
        if ($request->hasFile('file')) {
            $files = Str::random(20).'.'.$request->file->getClientOriginalName();
            $request->file('file')->move("file/mainmenu/", $files);
            $requests['file'] = "file/mainmenu/".$files;
        }

        $mainmenu = MainMenu::create($requests);
        if($mainmenu){
            return redirect('admin/mainmenu')->with('status', 'Berhasil menambahkan data!');
        }
        return redirect('admin/mainmenu/create')->with('status', 'Gagal menambahkan data!');
    }

    //menampilkan form edit data
    public function edit($id){
        $title = 'Main Menu';
        $data = MainMenu::find($id);
        $mainmenus = MainMenu::get();
        return view('admin.mainmenu.edit', compact('title', 'data', 'mainmenus'));
    }

    //update data
    public function postEdit(Request $request, $id){
        $request->validate(MainMenu::$rules);

        $mainmenu = MainMenu::find($id);
        if($mainmenu == null) {
            return redirect('admin/mainmenu')->with('status', 'Data tidak ditemukan!');
        }

        $req = $request->all();
        
        if ($request->hasFile('file')) {
            if($mainmenu->file != "" || $mainmenu->file !== null){
                 File::delete($mainmenu->file);
            }

            $file = $request->file('file');
            $destinationPath = "file/mainmenu/";
            $filename = Str::random(20) . '.' . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $req['file'] = $destinationPath.$filename;
       }

       $update = $mainmenu->update($req);

        if($update){
            return redirect('admin/mainmenu')->with('status', 'Berhasil mengubah data!');
        }
        return redirect('admin/mainmenu/edit/'.$id)->with('status', 'Gagal mengubah data!');
    }

    //menghapus data
    public function delete($id){
        $mainmenu = MainMenu::find($id);

        if($mainmenu == null){
            return redirect('admin/mainmenu')->with('status', 'Data tidak ditemukan!');
        }
        if($mainmenu->file != null || $mainmenu->file != ""){
            File::delete($mainmenu->file);
        }
        $delete = $mainmenu->delete();
        if($delete){
            return redirect('admin/mainmenu')->with('status', 'Berhasil menghapus data!');
        }
        return redirect('admin/mainmenu')->with('status', 'Gagal menghapus data!');

    }
}
