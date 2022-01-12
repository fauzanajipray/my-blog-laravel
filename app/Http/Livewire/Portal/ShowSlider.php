<?php

namespace App\Http\Livewire\Portal;

use App\Models\Slider;
use Livewire\Component;

class ShowSlider extends Component
{
    private $sliders;

    public function mount($sliders)
    {
        $this->sliders = $sliders;
    }

    public function render()
    {
        return view('livewire.portal.show-slider', [
            'sliders' => $this->sliders
        ]);
    }
}
