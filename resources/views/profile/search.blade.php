<x-guest-layout>
    <div class="container mx-auto py-12">
        <h1 class="text-2xl font-bold mb-6">Zoek Profiel</h1>
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
</x-guest-layout>