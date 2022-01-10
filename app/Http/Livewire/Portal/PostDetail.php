<?php

namespace App\Http\Livewire\Portal;

use App\Models\Category;
use Livewire\Component;

class PostDetail extends Component
{
    private $post;
    private $category;
    private $user;

    public function mount($post, $user){
        $this->post = $post;
        $this->category = Category::find($post->category_id)->name;
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.portal.post-detail', [
            'post' => $this->post,
            'category' => $this->category,
            'user' => $this->user
        ]);
    }
}
