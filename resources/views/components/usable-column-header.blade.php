{{-- @php
    if ($sortDirection == 'asc') {
        $currentSortDirection = 'asc';
        $sortDirection = 'desc';
    } else if ($sortDirection == 'desc') {
        $currentSortDirection = 'desc'
        $sortDirection = '';
    } else {
        $currentSortDirection = '';
        $sortDirection = 'asc';
    }
@endphp --}}


<div class="flex space-x-4 items-center">
    <a href="{{ route('usables') }}">
        {{ $slot }}
    </a>
</div>
