<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-return-button route="admin.news.index" /> &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-10">
                {{ __('Comments') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Comments') }}</h3>
                    @foreach($comments as $comment)
                        <div class="mb-4">
                            <p class="text-gray-800">{{ $comment->content }}</p>
                            <p class="text-gray-600 text-sm">{{ $comment->user->name }} - {{ $comment->created_at }}</p>
                        </div>
                        <form method="POST" action="{{ route('admin.news.commentsDestroy', [$newsItem->id, $comment->id]) }}">
                            @csrf
                            @method('DELETE')
                            <div class="flex items-center justify-end mt-4">
                                <x-danger-button>{{ __('Delete Comment') }}</x-danger-button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>