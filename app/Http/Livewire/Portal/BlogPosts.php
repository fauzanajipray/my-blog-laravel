<?php

namespace App\Http\Livewire\Portal;

use App\Models\Post;
use Livewire\Component;

class BlogPosts extends Component
{
    private $posts;

    public function mount($posts)
    {
        $this->posts = $posts;
        
    }

    public function render()
    {
        return view('livewire.portal.blog-posts', [
            'posts' => $this->posts
        ]);
    }
}
