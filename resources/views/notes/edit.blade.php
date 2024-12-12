<!-- resources/views/notes/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <!-- Título -->
        <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-10">Editar Nota</h1>

        <!-- Formulario de edición de nota -->
        <form 
            method="POST" 
            action="{{ route('notes.update', $note->id) }}" 
            enctype="multipart/form-data" 
            class="bg-white rounded-lg shadow-md p-8 max-w-2xl mx-auto"
        >
            @csrf
            @method('PUT')

            <!-- Campo de título -->
            <div class="mb-6">
                <label 
                    for="title" 
                    class="block text-lg font-medium text-gray-700 mb-2"
                >
                    Título
                </label>
                <input 
                    type="text" 
                    name="title" 
                    value="{{ $note->title }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Escribe el título de tu nota" 
                    required
                >
            </div>

            <!-- Campo de cuerpo -->
            <div class="mb-6">
                <label 
                    for="body" 
                    class="block text-lg font-medium text-gray-700 mb-2"
                >
                    Cuerpo
                </label>
                <textarea 
                    name="body" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                    rows="5" 
                    placeholder="Escribe el contenido de tu nota" 
                    required
                >{{ $note->body }}</textarea>
            </div>

            <!-- Campo de imagen -->
            <div class="mb-6">
                <label 
                    for="image" 
                    class="block text-lg font-medium text-gray-700 mb-2"
                >
                    Imagen (opcional)
                </label>
                <input 
                    type="file" 
                    name="image" 
                    class="w-full px-4 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                @if ($note->image)
                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-medium">Imagen actual:</label>
                        <img 
                            src="{{ Storage::url($note->image) }}" 
                            alt="Imagen" 
                            class="w-20 h-20 object-cover rounded-lg shadow-md"
                        >
                    </div>
                @endif
            </div>

            <!-- Botón de actualizar -->
            <div class="text-center">
                <button 
                    type="submit" 
                    class="px-6 py-3 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 transition-transform transform hover:scale-105"
                >
                    Actualizar Nota
                </button>
            </div>
        </form>
    </div>
@endsection