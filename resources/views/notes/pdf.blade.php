<!-- resources/views/notes/pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>{{ $note->title }}</title>
</head>
<body>
    <h1>{{ $note->title }}</h1>
    <p>{{ $note->body }}</p>

    @if ($note->image)
    <img src="{{ public_path('storage/' . $note->image) }}" alt="Imagen" width="200">
    @endif
</body>
</html>