<?php

namespace App\Http\Livewire\Portal;

use Livewire\Component;

class PostBlogShort extends Component
{
    private $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.portal.post-blog-short', [
            'post' => $this->post,
        ]);
    }
}
