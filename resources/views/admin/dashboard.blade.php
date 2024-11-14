<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-return-button route="home" /> &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-10">
                {{ __('Admin Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <x-card 
                    title="{{ __('Manage Users') }}" 
                    description="{{ __('Create and edit, and delete users.') }}" 
                    link="{{ route('admin.users.index') }}" 
                />

                <x-card 
                    title="{{ __('Manage News') }}" 
                    description="{{ __('Create, edit, and delete news items.') }}" 
                    link="{{ route('admin.news.index') }}" 
                />

                <x-card 
                    title="{{ __('Manage FAQ and categories') }}" 
                    description="{{ __('Create, edit, and delete FAQ and categories.') }}" 
                    link="{{ route('admin.faqs.index') }}" 
                />
            </div>
        </div>
    </div>
</x-app-layout>