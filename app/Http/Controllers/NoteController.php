<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('query');
        $notes = Note::where('title', 'like', "%{$query}%")
                     ->orWhere('body', 'like', "%{$query}%")
                     ->get();

        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|image',
        ]);

        $note = new Note();
        $note->title = $request->title;
        $note->body = $request->body;

        // Subir imagen
        if ($request->hasFile('image')) {
            $note->image = $request->file('image')->store('images', 'public');
        }

        $note->save();

        return redirect()->route('notes.index');
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|image',
        ]);

        $note->title = $request->title;
        $note->body = $request->body;

        if ($request->hasFile('image')) {
            // Borrar imagen anterior
            if ($note->image) {
                Storage::delete('public/' . $note->image);
            }
            $note->image = $request->file('image')->store('images', 'public');
        }

        $note->save();

        return redirect()->route('notes.index');
    }

    public function destroy(Note $note)
    {
        // Borrar imagen anterior
        if ($note->image) {
            Storage::delete('public/' . $note->image);
        }

        $note->delete();

        return redirect()->route('notes.index');
    }

    public function generatePDF(Note $note)
    {
        // Obtener la URL completa de la imagen
        $imageUrl = Storage::url($note->image);
        $imageUrl = asset($imageUrl); // Esto convierte la ruta en una URL accesible

        // Pasar la URL de la imagen al PDF
        $pdf = Pdf::loadView('notes.pdf', compact('note', 'imageUrl'));

        // Descargar el PDF
        return $pdf->download('note_' . $note->id . '.pdf');
}
}