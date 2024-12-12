<!-- resources/views/notes/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <!-- Título -->
        <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-10">Crear Nota</h1>

        <!-- Formulario de creación de nota -->
        <form 
            method="POST" 
            action="{{ route('notes.store') }}" 
            enctype="multipart/form-data" 
            class="bg-white rounded-lg shadow-md p-8 max-w-2xl mx-auto"
        >
            @csrf

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
                ></textarea>
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
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
            </div>

            <!-- Botón de guardar -->
            <div class="text-center">
                <button 
                    type="submit" 
                    class="px-6 py-3 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 transition-transform transform hover:scale-105"
                >
                    Guardar Nota
                </button>
            </div>
        </form>
    </div>
@endsection