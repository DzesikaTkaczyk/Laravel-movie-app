
<div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
    <input wire:model.debounce.500ms="search" type="text" class="bg-gray-800 rounded-full text-sm w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search">
    <div class="absolute top-0 ">i</div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>

    @if (strlen($search) > 2 )
    <div class="absolute bg-gray-800 text-sm rounded w-64 mt-4" x-show="isOpen" @keydown.escape.window="isOpen = false">
        @if ($searchRes->count() > 0 )
        <ul>
            @foreach ($searchRes as $res)
            <li class="border-b border-gray-700">
                <a href="{{ route('movies.show', $res['id']) }}" class="block hover:bg-gray-700 px-3 py-3 flex items-center">
                    @if ($res['poster_path'])
                    <img src="{{ 'https://image.tmdb.org/t/p/w92/'.$res['poster_path'] }}" alt="{{ $res['title'] }}" class="w-8">
                    @else
                        <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                    @endif
                    <span class="ml-4">{{ $res['title'] }}</span>
                    
                </a>
            </li>
            @endforeach
        </ul>
        @else
        <div class="px-3 py-3">No results</div>
        @endif
    </div>
    @endif
</div>

