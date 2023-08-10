<div class="p-6 text-gray-900">
    @if (!Auth::user()->election)
        {{ __("You have not been assigned to vote") }}
    @else
        {{ __("You are cleared for voting")}}
    @endif

</div>