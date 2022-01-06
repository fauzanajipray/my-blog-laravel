<?php

namespace App\Http\Controllers;

use App\Models\Message;

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
}
