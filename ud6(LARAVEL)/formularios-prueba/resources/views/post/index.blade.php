<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-6 flex flex-col h-full">
        <div class="py-6 grow w-full max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col justify-center">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col items-center p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-bold text-lg mb-6">
                        {{ __('Posts') }}
                    </h2>
                    @foreach ($posts as $post)
                        @can('view-post', $post)
                            <div class="container mx-auto py-12 px-32 mb-6 bg-gray-700 rounded-lg">
                                <h3 class="text-2xl font-bold inline-block">{{ $post->titulo }}</h3>
                                @if ($post->acceso === 'privado')
                                    <span
                                        class="ml-2 py-px px-1 relative bottom-1 rounded-sm text-sm bg-gray-600">{{ __('Private') }}</span>
                                @endif
                                <p class="text-lg font-bold mt-4">{{ $post->extracto }}</p>
                                <p class="my-4">{{ $post->contenido }}</p>
                                <small>{{ $post->user->name }} - {{ $post->created_at }}</small>
                                <div class="flex">
                                    @if ($post->comentable)
                                        <a href="#"
                                            class="mt-4 mr-4 text-gray-400 hover:text-gray-100">{{ __('Comment') }}</a>
                                    @endif
                                    @can('edit-post', $post)
                                        <a href="{{ route('posts.edit', $post) }}"
                                            class="mt-4 mr-4 text-gray-400 hover:text-gray-100">{{ __('Edit') }}</a>
                                    @endcan
                                    @can('delete-post', $post)
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="mt-4 text-gray-400 hover:text-gray-100">{{ __('Delete') }}</button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        @endcan
                    @endforeach
                </div>
            </div>
            <a class="mx-auto mt-12 dark:text-white" href="#">{{ __('Back to top') }}</a>
        </div>
    </div>

</x-app-layout>
