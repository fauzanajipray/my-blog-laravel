<?php

namespace App\Http\Livewire\Portal;

use App\Models\Category;
use Livewire\Component;

class PostBlogPreview extends Component
{
    private $post;
    private $category;

    public function mount($post)
    {
        $this->post = $post;
        $this->category = Category::find($post->category_id)->name;
    }

    public function render()
    {
        return view('livewire.portal.post-blog-preview', [
            'post' => $this->post,
            'category' => $this->category
        ]);
    }
}
