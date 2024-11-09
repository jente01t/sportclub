<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Profielen opzoeken -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <a href="{{ route('profile.search') }}" class="text-indigo-600 hover:text-indigo-900">
                            <h2 class="text-xl font-bold">{{ __("Profielen opzoeken") }}</h2>
                            <p>{{ __("Zoek en bekijk van profielen.") }}</p>
                            
                        </a>
                    </div>
                </div>

                <!-- Nieuwtjes lezen -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-xl font-bold">{{ __("Nieuwtjes lezen") }}</h2>
                        <p>{{ __("Lees de laatste nieuwtjes.") }}</p>
                        {{-- <a href="{{ route('news.index') }}" class="text-indigo-600 hover:text-indigo-900">{{ __("Ga naar Nieuwtjes lezen") }}</a> --}}
                    </div>
                </div>

                <!-- FAQ -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-xl font-bold">{{ __("FAQ") }}</h2>
                        <p>{{ __("Bekijk de veelgestelde vragen.") }}</p>
                        {{-- <a href="{{ route('faq.index') }}" class="text-indigo-600 hover:text-indigo-900">{{ __("Ga naar FAQ") }}</a> --}}
                    </div>
                </div>

                <!-- Contact pagina -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-xl font-bold">{{ __("Contact pagina") }}</h2>
                        <p>{{ __("Neem contact met ons op.") }}</p>
                        {{-- <a href="{{ route('contact.store') }}" class="text-indigo-600 hover:text-indigo-900">{{ __("Ga naar Contact pagina") }}</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>