<?php

namespace App\Http\Livewire\Portal;

use Livewire\Component;

class PostBlogPreview extends Component
{
    public $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.portal.post-blog-preview', [
            'post' => $this->post
        ]);
    }
}
