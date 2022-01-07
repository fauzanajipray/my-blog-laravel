<?php

namespace App\Http\Livewire;

use App\Models\MainMenu;
use Livewire\Component;

class ShowNavigation extends Component
{
    private $mainmenus;

    public function mount()
    {
        $this->mainmenus = MainMenu::where('status', 1)->where('parent', 0)->orderBy('order', 'asc')->get();
        
    }
    
    public function render()
    {
        return view('livewire.show-navigation', [
            'mainmenus' => $this->mainmenus
        ]);
    }
}
