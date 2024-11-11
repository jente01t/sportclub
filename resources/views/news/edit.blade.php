<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit News Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('news.update', $newsItem->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $newsItem->title)" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Image')" />
                            <input id="image" class="block mt-1 w-full" type="file" name="image" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            <img src="{{ asset('storage/' . $newsItem->image_path) }}" alt="{{ $newsItem->title }}" class="w-32 h-32 mt-2">
                        </div>

                        <div class="mt-4">
                            <x-input-label for="content" :value="__('Content')" />
                            <textarea id="content" class="block mt-1 w-full" name="content" rows="5" required>{{ old('content', $newsItem->content) }}</textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="published_at" :value="__('Publication Date')" />
                            <x-text-input id="published_at" class="block mt-1 w-full" type="date" name="published_at" :value="old('published_at', $newsItem->published_at)" required />
                            <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-primary-button type="button" onclick="document.getElementById('published_at').value = new Date().toISOString().split('T')[0]">
                                {{ __('Zet datum op vandaag') }}
                            </x-primary-button>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Update News Item') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>