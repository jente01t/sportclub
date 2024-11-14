<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-return-button route="home" /> &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-10">
                {{ __('Profielen zoeken') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('profile.search') }}" method="GET" class="mb-6">
                        <div class="flex items-center">
                            <input type="text" name="query" class="form-input flex-grow rounded-l-md border-r-0" placeholder="Zoek naar een profiel...">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600">Zoeken</button>
                        </div>
                    </form>

                    @if(isset($profiles) && $profiles->isNotEmpty())
                    <h2 class="text-xl font-semibold mb-4">Zoekresultaten:</h2>
                    <ul class="list-disc pl-5">
                        @foreach($profiles as $profile)
                            <li class="mb-2">
                                <a href="{{ route('profile.show', $profile->user_id) }}" class="text-blue-500 hover:underline">{{ $profile->user->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif

                @if(isset($profiles) && $profiles->isEmpty())
                    <h2 class="text-xl font-semibold">Geen profielen gevonden</h2>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>