<?php

namespace App\Livewire;

use App\Models\Office;
use Livewire\Attributes\Computed;
use Livewire\Component;

class VotingPanel extends Component
{
    public $election;

    public $office;
    public $step;
    public $voter;

    public $votes = [];

    public function mount() {
        $this->step = 0;
        $voter = auth()->user();
        $this->election = $voter->election;
        $this->office = $this->election->offices[$this->step];
    }

    public function nextStep() {
        if($this->step < $this->election->offices->count() - 1) {
            $this->step++;
        }
        $this->office = $this->election->offices[$this->step];
    }

    public function previousStep() {
        if($this->step > 0) {
            $this->step--;
        }
        $this->office = $this->election->offices[$this->step];
    }
    public function castVote($office, $candidate) {
        $this->votes[$office] = $candidate;
        $this->nextStep();
    }

    #[Computed]
    public function isLastStep() {
        return $this->step == $this->election->offices->count() - 1;
    }




    public function render()
    {
        return view('livewire.voting-panel');
    }
}
