<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-return-button route="admin.dashboard" /> &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-10">
                {{ __('Contact Forms') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Contact Forms') }}</h3>
                    <ul>
                        @foreach($contactForms as $contactForm)
                            <li class="mb-2 flex items-center">
                                <input type="checkbox" disabled {{ $contactForm->answered ? 'checked' : '' }} class="mr-2">
                                <a href="{{ route('admin.contact.contactShow', $contactForm->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                    {{ $contactForm->name }} - {{ $contactForm->email }} ({{ $contactForm->created_at->format('d-m-Y H:i') }})
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>