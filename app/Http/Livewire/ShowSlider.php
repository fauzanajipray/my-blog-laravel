<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use Livewire\Component;

class ShowSlider extends Component
{

    private $sliders;

    public function mount()
    {
        $this->sliders = Slider::where('status', 1)->orderby('order','asc')->get();
    }

    public function render()
    {
        return view('livewire.show-slider', [
            'sliders' => $this->sliders
        ]);
    }
    
}
