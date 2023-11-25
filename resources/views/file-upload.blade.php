<!-- @section('content_header','Create Image File') -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload de fotos') }}
        </h2>
    </x-slot>
    
    <form action="{{ route('file-post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <input type="text" name="description">
        
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Gravar</button>

    </form>
    
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

</x-app-layout>
