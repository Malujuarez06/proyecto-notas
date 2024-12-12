@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <!-- Título -->
        <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-10">Notas</h1>

        <!-- Formulario de búsqueda -->
        <div class="mb-8 flex justify-center">
            <form method="GET" action="{{ route('notes.index') }}" class="flex items-center w-full max-w-xl">
                <input 
                    type="text" 
                    name="query" 
                    placeholder="Buscar notas..." 
                    value="{{ request()->query('query') }}" 
                    class="px-6 py-3 border border-gray-300 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 flex-grow"
                >
                <button 
                    type="submit" 
                    class="ml-3 px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300"
                >
                    Buscar
                </button>
            </form>
        </div>

        <!-- Botón "Crear Nota" alineado a la izquierda -->
        <div class="flex justify-start mb-8">
            <a 
                href="{{ route('notes.create') }}" 
                class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300"
            >
                Crear Nota
            </a>
        </div>

        <!-- Lista de notas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($notes as $note)
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">{{ $note->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($note->body, 120) }}</p>

                    <!-- Imagen de la nota (si existe) -->
                    @if ($note->image)
                        <div class="mb-4">
                            <img 
                                src="{{ Storage::url($note->image) }}" 
                                alt="Imagen" 
                                class="w-20 h-20 object-cover rounded-md mx-auto"  <!-- Cambié el tamaño aquí -->
                        </div>
                    @endif

                    <!-- Acciones -->
                    <div class="flex justify-between items-center">
                        <a 
                            href="{{ route('notes.edit', $note->id) }}" 
                            class="text-blue-500 hover:text-blue-600 text-sm font-medium"
                        >
                            Editar
                        </a>
                        <form 
                            action="{{ route('notes.destroy', $note->id) }}" 
                            method="POST" 
                            class="inline"
                        >
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                class="text-red-500 hover:text-red-600 text-sm font-medium"
                            >
                                Eliminar
                            </button>
                        </form>
                        <a 
                            href="{{ route('notes.pdf', $note->id) }}" 
                            class="text-green-500 hover:text-green-600 text-sm font-medium"
                        >
                            Ver PDF
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection