<div class="p-6 text-gray-900">
    @if (!$election)
        {{ __("You have not been assigned to vote") }}
    @else
        @foreach ($election->offices as $office)
            <div class="bg-stone-300 rounded p-3 my-5 shadow-2xl">
                <h3 class="text-2xl">{{$office->title}}</h3>
                <h6 class="text-lg font-medium">candidates:</h6>
                @foreach ($office->candidates as $candidate)
                <div class="bg-white rounded p-5 my-3 cursor-pointer hover:bg-green-100 active:bg-green-300 text-center">
                    <div><img src="{{$candidate->getFirstMediaUrl('images')}}" class="w-1/2 mx-auto my-0" alt=""></div>
                    <div>First Name: {{$candidate->first_name}}</div>
                    <div>Last Name: {{$candidate->last_name}}</div>
                    <div>Part: {{$candidate->part}}</div>
                </div>
                @endforeach
            </div>
        @endforeach
    @endif

</div>