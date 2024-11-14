<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-return-button route="admin.dashboard" /> &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-10">
                {{ __('Manage FAQs') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Manage FAQ Categories') }}</h3>

                    <div class="mb-4">
                        <a href="{{ route('admin.faq-categories.create') }}" class="text-indigo-600 hover:text-indigo-900 rounded-md hover:bg-green-600">
                            {{ __('Create New Category') }}
                        </a>
                    </div>

                    <div class="overflow-y-auto max-h-96 mb-6">
                        <ul>
                            @foreach($categories as $category)
                                <li class="mb-4">
                                    <h4 class="text-xl font-bold">{{ $category->name }}</h4>
                                    <div class="flex space-x-8">
                                        <a href="{{ route('admin.faq-categories.edit', $category->id) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                                        <form method="POST" action="{{ route('admin.faq-categories.destroy', $category->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">{{ __('Delete') }}</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="border-t border-gray-200 my-6"></div>
                    <br>
                    

                    <h3 class="font-semibold text-lg mb-4">{{ __('Manage FAQs') }}</h3>

                    <div class="mb-4">
                        <a href="{{ route('admin.faqs.create') }}" class="text-indigo-600 hover:text-indigo-900 rounded-md hover:bg-green-600">
                            {{ __('Create New FAQ') }}
                        </a>
                    </div>

                    <form method="GET" action="{{ route('admin.faqs.index') }}" class="mb-4">
                        <div class="flex items-center">
                            <input type="text" name="query" class="form-input flex-grow rounded-l-md border-r-0" placeholder="Search for FAQs..." value="{{ request('query') }}">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600">Search</button>
                        </div>
                    </form>

                    <div class="overflow-y-auto max-h-96 mb-6">
                        @foreach($categories as $category)
                            <h2 class="text-xl font-bold mb-4">{{ $category->name }}</h2>
                            <ul class="space-y-8">
                                @foreach($category->faqs as $faq)
                                    <li class="mb-4">
                                        <h4 class="text-xl font-bold">{{ $faq->question }}</h4>
                                        <p class="text-gray-600">{{ $faq->answer }}</p>
                                        <div class="flex space-x-8">
                                            <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                                            <form method="POST" action="{{ route('admin.faqs.destroy', $faq->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">{{ __('Delete') }}</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>