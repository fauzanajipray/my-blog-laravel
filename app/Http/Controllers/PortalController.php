<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MainMenu;
use App\Models\Post;
use App\Models\Message;
use App\Models\PostComment;
use App\Models\User;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index()
    {
        $data['post']           = Post::where('status', 1)->orderBy('created_at', 'desc');
        $data['latestposts']    = Post::where('status', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $data['headline']       = Post::where('status', 1)->where('is_headline', 1)->limit(1)->paginate(3);
        $data['headline2']       = Post::where('status', 1)->where('is_headline', 1)->paginate(3);

        $data['user']           = User::first();
        $data['categories']       = Category::get();
        
        return view('portal.index', compact('data'));    
    }
    
    public function about()
    {
        $data['post']           = Post::where('status', 1)->get();
        $data['latestposts']    = Post::where('status', 1)->limit(3)->get();
        $data['categories']       = Category::get();
        $data['user']           = User::first();
        return view('portal.about', compact('data'));
    }

    public function contact()
    {
        $data['title']          = "Contact";
        $data['posts']          = Post::where('status', 1)->get();
        $data['latestposts']    = Post::where('status', 1)->limit(3)->get();
        $data['categories']       = Category::get();
        $data['user']           = User::first();
        return view('portal.contact', compact('data'));
    }

    public function post()
    {
        $data['title']          = "Blog";
        $data['posts']          = Post::where('status', 1)->paginate(3);
        $data['latestposts']    = Post::where('status', 1)->limit(3)->get();
        $data['categories']     = Category::get();
        $data['user']           = User::first();
        return view('portal.post', compact('data'));
    }

    public function postDetail($id)
    {
        $data['posts']          = Post::where('status', 1)->get();
        $data['latestposts']    = Post::where('status', 1)->limit(3)->get();
        $data['categories']     = Category::get();
        $data['user']           = User::first();
        $post                   = Post::find($id);
        $data['comments']        = PostComment::where('post_id', $post->id)->get();
        return view('portal.post-detail', compact('post','data'));
    }

    public function menu($id)
    {
        $data['posts']          = Post::where('status', 1)->get();
        $data['latestposts']    = Post::where('status', 1)->limit(3)->get();
        $data['categories']     = Category::get();
        $data['user']           = User::first();
        $data['menu']           = MainMenu::find($id);
        return view('portal.menu', compact('data'));
    }

    public function category($id)
    {
        $data['posts']          = Post::where('status', 1)->where('category_id', $id)->paginate(3);
        $data['latestposts']    = Post::where('status', 1)->limit(3)->get();
        $data['categories']     = Category::get();
        $data['category']       = Category::find($id);
        $data['user']           = User::first();
        return view('portal.category', compact('data'));
    }

    public function search(Request $request)
    {
        $data['title']          = "Search";
        $data['posts']          = Post::where('status', 1)->where('title', 'like', '%'.$request->search.'%')
                                            ->orWhere('content', 'like', '%'.$request->search.'%')->get();
        $data['latestposts']    = Post::where('status', 1)->limit(3)->get();
        $data['categories']     = Category::get();
        $data['user']           = User::first();

        return view('portal.search', compact('data'));
    }
}
