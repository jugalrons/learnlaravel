<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
        @foreach ($posts as $post )
            <P>{{ $post->title }}</P>
        @endforeach
    </x-slot>
</x-app-layout>