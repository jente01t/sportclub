<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-6">{{ __('Laatste Nieuws') }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($newsItems as $newsItem)
                            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                <a href="{{ route('news.show', $newsItem->id) }}" class="block">
                                    <img src="{{ asset('storage/' . $newsItem->image_path) }}" alt="{{ $newsItem->title }}" class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <h4 class="text-xl font-bold mb-2">{{ $newsItem->title }}</h4>
                                        <p class="text-gray-600 mb-2">{{ $newsItem->published_at }}</p>
                                        <p class="text-gray-700">{{ Str::limit($newsItem->content, 40) }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>