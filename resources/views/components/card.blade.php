<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
        @if($link)
            <a href="{{ $link }}" class="text-indigo-600 hover:text-indigo-900">
                <h2 class="text-xl font-bold">{{ $title }}</h2>
                <p>{{ $description }}</p>
            </a>
        @else
            <h2 class="text-xl font-bold">{{ $title }}</h2>
            <p>{{ $description }}</p>
        @endif
    </div>
</div>