@extends('layouts.master')

@section('title', 'Listado de artículos')

@section('sidebar')
    @parent
    <p>Estás en la sección de artículos.</p>
@endsection

@section('content')
    <h1>Artículos de {{ $username }}</h1>
    <p><strong>ID del autor:</strong> {{ $id }}</p>
    <p><strong>Nombre de usuario:</strong> {{ $username }}</p>

    {{-- Condicional: solo mostramos la lista si hay artículos --}}
    @if (!empty($articles) && count($articles) > 0)
        <h2>Lista de artículos</h2>
        <ul>
            @foreach ($articles as $title)
                <li>{{ $title }}</li>
            @endforeach
        </ul>
    @else
        <p><em>No existen artículos</em></p>
    @endif
@endsection
