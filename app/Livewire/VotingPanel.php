<?php

namespace App\Livewire;

use App\Models\Candidate;
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
        }else{
            $this->dispatch('alert', 
                ['type' => 'info',  'message' => 'Kindly click on the finish button to submit']);
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

    #[Computed]
    public function hasParticipated() {
        return auth()->user()->hasVoted($this->election);
    }


    public function finish() {

        if (count($this->votes) != $this->election->offices->count()) {
            $this->dispatch('alert', 
                ['type' => 'error',  'message' => 'You have not voted for all offices']);
            return;
        }

        foreach($this->votes as $office => $candidate) {
            $candidate = Candidate::find($candidate);
            $candidate->votes()->attach(auth()->user()->id);
        }
        $this->dispatch('alert', 
            ['type' => 'success',  'message' => 'Your vote has been casted successfully']);
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.voting-panel');
    }
}
