<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index() {
        $title = 'Dashboard';
        return view('admin.index', compact('title'));
    }

    public function register(){
        return view('admin.register');
    }

    public function postRegister(Request $request){
        $request->validate(User::$rules);
        $requests = $request->all();
        $requests['password'] = Hash::make($requests['password']);
        $requests['image'] = "";
        
        if ($request->hasFile('image')) {
            $files = Str::random(20).'.'.$request->image->getClientOriginalName();
            $request->file('image')->move("file/admin", $files);
            $requests['image'] = 'file/admin/'.$files;
        }

        $user = User::create($requests);
        if ($user) {
            return redirect('login')->
            with('status', 'Berhasil mendaftar!');
        }
        return redirect('register')->with('status', 'Gagal mendaftar!');
    }

    public function login(){
        return view('admin.login');
    }

    public function postLogin(Request $request){
        
        $requests   = $request->all();
        $data       = User::where('email', $requests['email'])->first();
        $cek        = Hash::check($requests['password'], $data->password);
        if ($cek) {
            Session::put('admin', $data->email);
            Session::put('admin_id', $data->id);
            return redirect('admin');
        }
        return redirect('login')->with('status', 'Gagal login!');
    }

    public function logout(){
        Session::flush();
        return redirect('login')->with('status', 'Berhasil logout!');
    }

    public function edit(){
        $title = 'Edit Admin';
        $data = User::find(Session::get('admin_id'));
        if ($data) {
            return view('admin.profile.index', compact('title', 'data'));
        }
        return redirect('admin')->with('status', 'Data tidak ditemukan!');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = User::find($id);
        if ($data) {
            $req = request()->all();
            
            if ($request->hasFile('image')) {
                if($data->image != "" || $data->image !== null){
                    File::delete($data->image);
                }

                $file = $request->file('image');
                $destinationPath = "file/admin/";
                $filename = Str::random(20) . '.' . $file->getClientOriginalName();
                $file->move($destinationPath, $filename);
                $req['image'] = $destinationPath.$filename;
            }

            $update = $data->update($req);
            if($update){
                return redirect('admin')->with('status', 'Berhasil mengubah data!');
            }
            return redirect('admin/edit')->with('status', 'Gagal mengubah data!');
        }   
        return redirect('admin')->with('status', 'Data tidak ditemukan!');
    }

}
