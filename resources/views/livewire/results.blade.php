<div wire:poll>
    <div class="text-4xl text-center text-black p-5">Election: {{$election->title}}</div>
    <div class="grid grid-cols-3">
        <div class="min-h-5 bg-white rounded p-12 text-2xl font-bold shadow-lg">
            Total Votes Casted: {{$election->votes}}
        </div>
    </div>
    @foreach ($election->offices as $office)
    <div class="bg-stone-200 rounded p-5 my-5 shadow-sm">
        <h3 class="text-3xl font-extrabold">{{$office->title}}</h3>
        <h6 class="text-xl font-bold">Votes Casted: {{$office->votes}}</h6>
        <div class="grid lg:grid-cols-3 sm:grid-cols-1 gap-2 text-center">
            @foreach ($office->candidates as $candidate)
            <div class="bg-white rounded-lg px-5 py-12 my-3 cursor-pointer">
                <div><img src="{{$candidate->getFirstMediaUrl('images')}}"
                        class="w-2/3 mx-auto my-0 rounded-2xl shadow-lg" alt=""></div>
                <div class="mx-auto my-3 text-center">
                    <div class="text-xl font-extrabold "> {{$candidate->first_name}} {{$candidate->last_name}}</div>
                    <div class="text-lg font-bold text-gray-600"> {{$candidate->part}}</div>
                    <div class="text-2xl mt-4">{{$candidate->votes->count()}} {{$candidate->votes->count() == 1? 'Vote': 'Votes'}}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
