<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-return-button route="home" /> &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-10">
                {{ __('FAQs') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Frequently Asked Questions') }}</h3>
                    @foreach($categories as $category)
                        <div class="mb-4">
                            <h4 class="text-xl font-bold mb-4">{{ $category->name }}</h4>
                            <div class="space-y-6">
                                @foreach($category->faqs as $faq)
                                    <div x-data="{ open: false }" class="border border-gray-300 rounded-lg p-4 shadow-sm">
                                        <h5 @click="open = !open" class="font-semibold cursor-pointer flex justify-between items-center">
                                            {{ $faq->question }}
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-200" :class="{'rotate-180': open}" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </h5>
                                        <div x-show="open" x-transition class="mt-2">
                                            <p class="text-gray-700">{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>