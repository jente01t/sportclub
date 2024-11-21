<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

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
                    link="{{ route('contact.index') }}"
                />
                
                @auth
                    <x-card 
                        title="{{ __('Chat') }}" 
                        description="{{ __('Chat met andere gebruikers.') }}" 
                        link="{{ route('chats.index') }}"
                    />
                @endauth
            </div>
        </div>
    </div>
</x-app-layout>