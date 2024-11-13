<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <x-card 
                    title="{{ __('Profielen opzoeken') }}" 
                    description="{{ __('Zoek en bekijk van profielen.') }}" 
                    link="{{ route('profile.search') }}" 
                />

                <x-card 
                    title="{{ __('Nieuwtjes lezen') }}" 
                    description="{{ __('Lees de laatste nieuwtjes.') }}" 
                    link="{{ route('news.index') }}" 
                />

                <x-card 
                    title="{{ __('FAQ') }}" 
                    description="{{ __('Bekijk de veelgestelde vragen.') }}" 
                    link="{{ route('faq.indexUser') }}"
                />

                <x-card 
                    title="{{ __('Contact pagina') }}" 
                    description="{{ __('Neem contact met ons op.') }}" 
                />
            </div>
        </div>
    </div>
</x-guest-layout>