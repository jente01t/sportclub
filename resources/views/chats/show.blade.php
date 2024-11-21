<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-return-button route="chats.index" /> &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-10">
                {{ __('Chat with ') }} {{ $chat->user1_id == Auth::id() ? $chat->user2->name : $chat->user1->name }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        @foreach($chat->messages as $message)
                            <div class="mb-2">
                                <strong>{{ $message->user->name }}:</strong> {{ $message->content }}
                                <span class="text-gray-600 text-sm">{{ $message->created_at->format('d-m-Y H:i') }}</span>
                            </div>
                        @endforeach
                    </div>
                    <form method="POST" action="{{ route('messages.store', $chat->id) }}">
                        @csrf
                        <div>
                            <x-input-label for="content" :value="__('Message')" />
                            <textarea id="content" name="content" class="block mt-1 w-full" rows="3" required></textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>{{ __('Send Message') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>