<div>
    <div class="p-6 text-gray-900">
        @if (!$election)
            {{ __("You have not been assigned to vote") }}
        @else
        <div class="bg-stone-200 rounded p-3 my-5 shadow-sm flex justify-between">
          <div class="bg-white p-3 rounded hover:bg-green-100 cursor-pointer" wire:click="previousStep()">Prev</div>
          @if ($this->isLastStep)
          <div class="bg-white p-3 rounded hover:bg-green-100 cursor-pointer">finish</div>
          @else
          <div class="bg-white p-3 rounded hover:bg-green-100 cursor-pointer" wire:click="nextStep()">Next</div>
          @endif
          
        </div>
                <div class="bg-stone-200 rounded p-5 my-5 shadow-sm">
                    <h3 class="text-3xl font-extrabold">{{$office->title}}</h3>
                    <div class="grid lg:grid-cols-3 sm:grid-cols-1 gap-2 text-center">
                        @foreach ($office->candidates as $candidate)
                        <div class="bg-white rounded-lg px-5 py-16 my-3 cursor-pointer 
                        active:bg-green-300 {{in_array($candidate->id, $votes)? 'bg-green-300' : 'hover:bg-green-100'}}" wire:click="castVote({{$office->id}}, {{$candidate->id}})">
                            <div><img src="{{$candidate->getFirstMediaUrl('images')}}" class="w-2/3 mx-auto my-0 rounded-2xl shadow-lg" alt=""></div>
                            <div class="mx-auto my-3 text-center">
                                <div class="text-xl font-extrabold "> {{$candidate->first_name}} {{$candidate->last_name}}</div>
                                <div class="text-lg font-bold text-gray-600"> {{$candidate->part}}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
        @endif
    
    </div>
</div>