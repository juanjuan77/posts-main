<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach ($posts as $post)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <h1 style="font-size: 25px; font-weight: 900">{{$post->title}}</h1>
                   <p>{{$post->description}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
