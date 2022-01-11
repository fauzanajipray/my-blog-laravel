<?php

namespace App\Http\Livewire\Portal;

use App\Models\Category;
use Livewire\Component;

class PostDetail extends Component
{
    private $post;
    private $category;
    private $user;
    private $comments;

    public function mount($post, $user, $comments){
        $this->post = $post;
        $this->category = Category::find($post->category_id)->name;
        $this->user = $user;
        $this->comments = $comments;
    }

    public function render()
    {
        return view('livewire.portal.post-detail', [
            'post' => $this->post,
            'category' => $this->category,
            'user' => $this->user,
            'comments' => $this->comments,
        ]);
    }
}
