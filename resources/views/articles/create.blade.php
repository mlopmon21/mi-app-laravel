@extends('layouts.master')

@section('title', 'Nuevo artículo')

@section('sidebar')
    @parent
    <p>Estás creando un nuevo artículo.</p>
@endsection

@section('content')
    <h1>Nuevo artículo</h1>

    {{-- Errores de validación --}}
    @if ($errors->any())
        <div style="color: red;">
            <p><strong>Se han encontrado errores:</strong></p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Título:</label><br>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
        </div>

        <div>
            <label for="body">Contenido:</label><br>
            <textarea name="body" id="body" rows="5" cols="40">{{ old('body') }}</textarea>
        </div>

        <div>
            <label for="date">Fecha:</label><br>
            <input type="date" name="date" id="date" value="{{ old('date') }}">
        </div>

        <br>

        <button type="submit">Guardar artículo</button>
    </form>

    <p>
        <a href="{{ route('articles.index') }}">← Volver al listado</a>
    </p>
@endsection
