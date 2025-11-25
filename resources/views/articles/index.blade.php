@extends('layouts.master')

@section('title', 'Todos los artículos')

@section('sidebar')
    @parent
    <p>Estás en el listado de todos los artículos.</p>
@endsection

@section('content')
    <h1>Listado de artículos</h1>

    {{-- Mensaje de éxito --}}

    @if (session('success'))
        <p style="color: green;"><strong>{{ session('success') }}</strong></p>
    @endif

    {{-- Mensaje de error --}}
    
    @if (session('error'))
        <p style="color: red;"><strong>{{ session('error') }}</strong></p>
    @endif

    <p>
        <a href="{{ route('articles.create') }}">Nuevo artículo</a>
    </p>

    @if ($articles->isEmpty())
        <p>No existen artículos.</p>
    @else
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>
                            <a href="{{ route('articles.show', $article->id) }}">
                                {{ $article->title }}
                            </a>
                        </td>
                        <td>{{ $article->date }}</td>
                        <td>
                            <form action="{{ route('articles.destroy', $article->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('¿Seguro que quieres borrar este artículo?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
