<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profiel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if ($user->profile)
                        <div>
                            <h3 class="text-lg font-semibold">{{ $user->name }}</h3>
                            <p class="text-gray-600">{{ $user->profile->birthday }}</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset('storage/' . $user->profile->foto) }}" alt="Profile Photo" class="w-22 h-22 rounded-full">
                        </div>
                        <div class="mt-4">
                            <h4 class="text-md font-semibold">{{ __('Over Mij') }}</h4>
                            <p class="text-gray-700">{{ $user->profile->bio }}</p>
                        </div>
                    @else
                        <p>{{ __('Geen profielinformatie beschikbaar.') }}</p>
                    @endif
                    @auth
                        @if (Auth::id() === $user->id)
                            <div class="mt-6">
                                <a href="{{ route('profile.edit') }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Edit Profiel') }}</a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
