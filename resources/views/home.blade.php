<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="text-center py-12">
        <h1 class="text-4xl font-extrabold text-blue-600" style="font-size: 4rem !important; font-weight: 800 !important;">
            {{ __('Welkom bij Sportclub') }}
        </h1>
        <p class="mt-6 text-4xl text-gray-700" style="font-size: 2rem !important;">
            {{ __('Doe mee en blijf fit!') }}
        </p>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <x-card 
                    title="{{ __('Profielen opzoeken') }}" 
                    description="{{ __('Zoek en bekijk van profielen.') }}" 
                    link="{{ route('profile.search') }}" 
                    class="bg-white shadow-lg rounded-lg overflow-hidden"
                />

                <x-card 
                    title="{{ __('Nieuwtjes lezen') }}" 
                    description="{{ __('Lees de laatste nieuwtjes.') }}" 
                    link="{{ route('news.index') }}" 
                    class="bg-white shadow-lg rounded-lg overflow-hidden"
                />

                <x-card 
                    title="{{ __('FAQ') }}" 
                    description="{{ __('Bekijk de veelgestelde vragen.') }}" 
                    link="{{ route('faq.indexUser') }}"
                    class="bg-white shadow-lg rounded-lg overflow-hidden"
                />

                <x-card 
                    title="{{ __('Contact pagina') }}" 
                    description="{{ __('Neem contact met ons op.') }}" 
                    link="{{ route('contact.index') }}"
                    class="bg-white shadow-lg rounded-lg overflow-hidden"
                />
                
                @auth
                    <x-card 
                        title="{{ __('Chat') }}" 
                        description="{{ __('Chat met andere gebruikers.') }}" 
                        link="{{ route('chats.index') }}"
                        class="bg-white shadow-lg rounded-lg overflow-hidden"
                    />
                @endauth
            </div>
            <div class="text-center mt-6 flex justify-center">
                <svg fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 300 300" enable-background="new 0 0 300 300" class="w-48 h-48"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><g><path d="M150,7.5C71.421,7.5,7.5,71.434,7.5,150S71.421,292.5,150,292.5S292.5,228.566,292.5,150S228.579,7.5,150,7.5z M150,278.924c-71.092,0-128.924-57.841-128.924-128.924S78.908,21.076,150,21.076S278.924,78.917,278.924,150 S221.092,278.924,150,278.924z"></path><rect x="110.992" y="136.424" width="78.017" height="27.152"></rect><path d="M58.402,128.786v2.758c-1.021-0.624-2.14-1.051-3.405-1.051c-3.748,0-6.779,3.036-6.779,6.778v25.457 c0,3.742,3.031,6.778,6.779,6.778c1.265,0,2.384-0.427,3.405-1.051v2.758c0,6.915,5.186,12.556,11.872,13.396V115.39 C63.588,116.23,58.402,121.871,58.402,128.786z"></path><path d="M245.003,130.493c-1.265,0-2.384,0.427-3.404,1.051v-2.758c0-6.915-5.187-12.556-11.872-13.396v69.221 c6.686-0.841,11.872-6.481,11.872-13.396v-2.758c1.021,0.624,2.14,1.051,3.404,1.051c3.748,0,6.779-3.036,6.779-6.778v-25.457 C251.782,133.529,248.751,130.493,245.003,130.493z"></path><path d="M90.628,94.033c-7.487,0-13.566,6.079-13.566,13.575v84.783c0,7.496,6.08,13.575,13.566,13.575 c7.496,0,13.576-6.079,13.576-13.575v-84.783C104.204,100.112,98.124,94.033,90.628,94.033z"></path><path d="M209.372,94.033c-7.496,0-13.576,6.079-13.576,13.575v84.783c0,7.496,6.08,13.575,13.576,13.575 c7.487,0,13.566-6.079,13.566-13.575v-84.783C222.938,100.112,216.859,94.033,209.372,94.033z"></path></g></g></svg>
            </div>
        </div>
    </div>
</x-app-layout>