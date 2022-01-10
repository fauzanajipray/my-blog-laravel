<?php

namespace App\Http\Controllers;

use App\Models\PostComment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function insert(Request $request) {
        $this->validate($request, PostComment::$rules);
        $data = $request->all();

        $insert = PostComment::create($data);
        if($insert){

            return redirect('post-detail/'.$data['post_id'])->with('status', 'Berhasil mengirim komentar!');
        }
        return redirect('post-detail/'.$data['post_id'])->with('status', 'Gagal mengirim komentar');
    }

}
