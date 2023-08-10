<div class="p-6 text-gray-900">
    @if (!Auth::user()->election)
        {{ __("You have not been assigned to vote") }}
    @endif
    
</div>