<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-return-button route="news.index" /> &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-10">
                {{ __('News') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-bold">{{ $newsItem->title }}</h3>
                    <img src="{{ asset('storage/' . $newsItem->image_path) }}" alt="{{ $newsItem->title }}" class="w-full h-auto mt-4 mb-4">
                    <p class="text-gray-600">{{ $newsItem->published_at }}</p>
                    <p class="text-gray-700 mt-4 break-words overflow-hidden">{{ $newsItem->content }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>