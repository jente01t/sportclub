<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-return-button route="admin.dashboard" /> &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Users') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Manage Users') }}</h3>

                    <div class="mb-4">
                        <a href="{{ route('admin.createUser') }}" class="text-indigo-600 hover:text-indigo-900 rounded-md hover:bg-green-600">
                            {{ __('Create New User') }}
                        </a>
                    </div>

                    <form method="GET" action="{{ route('admin.users.index') }}" class="mb-4">
                        <div class="flex items-center">
                            <input type="text" name="query" class="form-input flex-grow rounded-l-md border-r-0" placeholder="Zoek naar een gebruiker..." value="{{ request('query') }}">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600">Zoeken</button>
                        </div>
                    </form>

                    <div class="overflow-y-auto max-h-96 mb-6">
                        <ul>
                            @foreach($users as $user)
                                <li class="mb-2">
                                    {{ $user->name }} ({{ $user->role }})
                                    @if($user->role == 'user')
                                        <a href="{{ route('admin.promote', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Promote to Admin') }}</a>
                                    @elseif($user->role == 'admin')
                                        <a href="{{ route('admin.demote', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Demote to User') }}</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>