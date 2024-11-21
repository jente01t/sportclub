<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-return-button route="home" /> &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-10">
                {{ __('Chats') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Your Chats') }}</h3>
                
                    <div class="mb-4">
                        <a href="{{ route('chats.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Start a New Chat') }}
                        </a>
                    </div>
                    
                    <ul>
                        @foreach($chats as $chat)
                            <li class="mb-2">
                                <a href="{{ route('chats.show', $chat->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                    Chat with {{ $chat->user1_id == Auth::id() ? $chat->user2->name : $chat->user1->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>