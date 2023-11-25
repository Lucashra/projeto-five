<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload de fotos') }}
        </h2>
    </x-slot>
    
    <form action="/file-upload" method="post">
        @csrf
        <input type="file" name="file" required>
        <input type="text" name="description">
        
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Gravar</button>

    </form>

</x-app-layout>
