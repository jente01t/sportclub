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
                    <img src="{{ asset('storage/' . $newsItem->image_path) }}" alt="{{ $newsItem->title }}" class="w-32 h-auto mb-4">
                    <p>{{ $newsItem->content }}</p>
                    <p class="text-gray-600 text-sm mt-4">{{ $newsItem->published_at }}</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Comments') }}</h3>
                    @foreach($newsItem->comments as $comment)
                        <div class="mb-4">
                            <p class="text-gray-800">{{ $comment->content }}</p>
                            <p class="text-gray-600 text-sm">{{ $comment->user->name }} - {{ $comment->created_at }}</p>
                        </div>
                    @endforeach

                    @auth
                        <form method="POST" action="{{ route('comments.store', $newsItem->id) }}">
                            @csrf
                            <div class="mt-4">
                                <x-input-label for="content" :value="__('Add a comment')" />
                                <textarea id="content" name="content" class="block mt-1 w-full" rows="3" required></textarea>
                                <x-input-error :messages="$errors->get('content')" class="mt-2" />
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button>{{ __('Post Comment') }}</x-primary-button>
                            </div>
                        </form>
                    @else
                        <p class="text-gray-600">{{ __('Log in om een reactie te plaatsen.') }}</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>