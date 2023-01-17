<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 flex flex-col h-full">
        <div class="py-6 grow w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col items-center p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-bold text-lg">
                        {{ __('Welcome again') }}, {{ auth()->user()->name }}!
                    </h2>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
