<?php

namespace App\Livewire;

use Livewire\Component;

class VotingPanel extends Component
{
    public $election;
    public $voter;
    public function mount() {
        $voter = auth()->user();
        $this->election = $voter->election;
    }
    public function render()
    {
        return view('livewire.voting-panel');
    }
}
