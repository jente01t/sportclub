<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-return-button route="admin.contact.contactIndex" /> &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-10">
                {{ __('Contact Form') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Contact Form') }}</h3>
                    <p><strong>{{ __('Name:') }}</strong> {{ $contactForm->name }}</p>
                    <p><strong>{{ __('Email:') }}</strong> {{ $contactForm->email }}</p>
                    <p><strong>{{ __('Message:') }}</strong></p>
                    <p>{{ $contactForm->message }}</p>
                    <p><strong>{{ __('Submitted on:') }}</strong> {{ $contactForm->created_at->format('d-m-Y H:i') }}</p>
                    <p><strong>{{ __('Answered:') }}</strong> <input type="checkbox" disabled {{ $contactForm->answered ? 'checked' : '' }}></p>

                    <form method="POST" action="{{ route('admin.contact.contactReply', $contactForm->id) }}">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="reply" :value="__('Reply')" />
                            <textarea id="reply" name="reply" class="block mt-1 w-full" rows="5" required></textarea>
                            <x-input-error :messages="$errors->get('reply')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>{{ __('Send Reply') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>