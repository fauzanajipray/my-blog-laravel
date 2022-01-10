<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MainMenu;
use App\Models\Post;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index()
    {
        $data['post']           = Post::where('status', 1)->orderBy('created_at', 'desc');
        $data['latestposts']    = Post::where('status', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $data['headline']       = Post::where('status', 1)->where('is_headline', 1)->limit(3)->get();
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

    public function contact($id)
    {
        $data['posts']          = Post::where('status', 1)->get();
        $data['latestposts']    = Post::where('status', 1)->limit(3)->get();
        $data['categories']       = Category::get();
        $data['user']           = User::first();
        return view('portal.contact', compact('data'));
    }

    public function post()
    {
        $data['posts']          = Post::where('status', 1)->get();
        $data['latestposts']    = Post::where('status', 1)->limit(3)->get();
        $data['categories']       = Category::get();
        $data['user']           = User::first();
        return view('portal.post', compact('data'));
    }

    public function postDetail($id)
    {
        $data['posts']          = Post::where('status', 1)->get();
        $data['latestposts']    = Post::where('status', 1)->limit(3)->get();
        $data['categories']       = Category::get();
        $data['user']           = User::first();
        $posts                  = Post::find($id);
        return view('portal.post-detail', compact('posts','data'));
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
        $data['posts']          = Post::where('status', 1)->where('category_id', $id)->get();
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
