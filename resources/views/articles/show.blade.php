@extends('layouts.master')

@section('title', $article->title)

@section('sidebar')
    @parent
    <p>Estás viendo el detalle de un artículo.</p>
@endsection

@section('content')
    <h1>{{ $article->title }}</h1>

    <p><strong>Autor:</strong> {{ optional($article->user)->username ?? 'Autor desconocido' }}</p>
    <p><strong>Fecha:</strong> {{ $article->date }}</p>

    <hr>

    <p>{{ $article->body }}</p>

    <p>
        <a href="{{ route('articles.index') }}">← Volver al listado</a>
    </p>
@endsection
