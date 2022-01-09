<?php

namespace App\Http\Livewire\Portal;

use App\Models\Post;
use Livewire\Component;

class BlogPosts extends Component
{
    private $posts;

    public function mount()
    {
        $this->posts = Post::where('status', 1)->orderBy('created_at', 'desc')->get();
        
    }

    public function render()
    {
        return view('livewire.portal.blog-posts', [
            'posts' => $this->posts
        ]);
    }
}
