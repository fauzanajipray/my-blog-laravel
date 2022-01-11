<?php

namespace App\Http\Livewire\Portal;

use Livewire\Component;

class Sidebar extends Component
{
    private $posts;
    private $categories;
    private $user;
    
    public function mount($posts, $categories, $user)
    {
        $this->posts = $posts;
        $this->categories = $categories;
        $this->user = $user;
    }
    
    public function render()
    {
        return view('livewire.portal.sidebar', [
            'posts' => $this->posts,
            'categories' => $this->categories,
            'user' => $this->user,
        ]);
    }
}
