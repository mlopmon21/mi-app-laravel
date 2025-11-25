<?php

//Ejercicio 5
namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;



class ArticleController extends Controller
{
    public function index()
    {
        // Recuperar todos los artículos ordenados por fecha descendente
        $articles = Article::orderBy('date', 'desc')->get();

        // Pasar los artículos a la vista resources/views/articles/index.blade.php
        return view('articles.index', compact('articles'));
    }

    //Ejercicio 6
    public function show($id)
    {
        // Cargar el artículo junto con su autor (user)
        $article = Article::with('user')->findOrFail($id);

        return view('articles.show', compact('article'));
    }

    //Ejercicio 7
    public function create()
    {
        return view('articles.create');
    }

    //Guardar artículo
    public function store(Request $request)
    {
        // Validación básica
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required',
            'date'  => 'required|date',
        ]);

        // Guardar artículo en la base de datos
        Article::create([
            'title'   => $validated['title'],
            'body'    => $validated['body'],
            'date'    => $validated['date'],
            'user_id' => 1,
        ]);

        // Redirigir al listado con mensaje de éxito
        return redirect()
            ->route('articles.index')
            ->with('success', 'Artículo creado correctamente.');
    }

    //Ejercicio 8 - Borrar artículo
    public function destroy($id)
    {
    $article = Article::find($id);

    if (!$article) {
        return redirect()
            ->route('articles.index')
            ->with('error', 'Artículo no encontrado.');
    }

    try {
        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artículo borrado correctamente.');
    } catch (\Exception $e) {
        return redirect()
            ->route('articles.index')
            ->with('error', 'Error al borrar el artículo.');
    }
    }
   
}   