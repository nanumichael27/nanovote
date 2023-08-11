<?php

namespace App\Livewire;

use App\Models\Election;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Results extends Component
{

    public $election;

    public function mount(Election $election) {
        $this->election = $election;
    }

    #[Layout('layouts.voter')] 
    public function render()
    {
        return view('livewire.results');
    }
}
