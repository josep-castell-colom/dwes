<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit post') }}
        </h2>
    </x-slot>

    <div class="py-6 flex flex-col h-full">
        <div class="py-6 w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col items-center">
                    <h2 class="font-bold text-lg">
                        {{ __('Edit post') }}
                    </h2>
                    <form action="{{ route('posts.update', $post) }}" method="POST"
                        class="flex flex-col my-6 p-6 w-3/4 bg-gray-700 rounded-lg">
                        @csrf
                        @method('PUT')
                        @include('components.form')
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
