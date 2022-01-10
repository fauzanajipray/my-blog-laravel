<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // menampilkan semua data
    public function index()
    {   
        $title = 'Messages';
        $data = Message::all();
        return view('admin.message.index', compact('data', 'title'));
    }

    // menghapus data
    public function delete($id)
    {
        $data = Message::find($id);
        if ($data == null) {
            return redirect('admin/message')->with('status', 'Data tidak ditemukan!');
        }
        $delete = $data->delete();
        if($delete){
            return redirect('admin/message')->with('status', 'Berhasil menghapus data!');
        }
        return redirect('admin/message')->with('status', 'Gagal menghapus data!');
    }

    //Menginput data
    public function insert(Request $request)
    {
        $this->validate($request, Message::$rules);
        
        $insert = Message::create($request->all());
        if($insert){
            return redirect('contact')->with('status', 'Berhasil mengirim pesan!');
        }
        return redirect('contact')->with('status', 'Gagal mengirim pesan!');
    }
     
}
