<?php

namespace App\Http\Livewire;

use App\Models\Dapros as ModelsDapros;
use Livewire\Component;

class Dapros extends Component
{
    public $dapros_details = [];

    public function mount()
    {
    }
    public function DaprosDetails($dapros_id)
    {
        $this->products_details = ModelsDapros::where('id', $dapros_id)->get();
    }
    public function render()
    {
        return view('livewire.dapros');
    }
}
