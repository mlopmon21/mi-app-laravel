<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;

class ArticlesController extends Controller
{
    public function test()
    {
        // Obtener todos los artículos
        $allArticles = Article::all();

        // Buscar un artículo por ID
        $firstArticle = Article::find(1);

        // Artículos de un usuario concreto (por ejemplo user_id = 1)
        $userArticles = Article::where('user_id', 1)->get();

        // Crear un nuevo artículo con save()
        $user = User::first();

        $newArticle = new Article();
        $newArticle->title = 'Artículo creado con Eloquent';
        $newArticle->body = 'Contenido de prueba';
        $newArticle->date = now()->toDateString();
        $newArticle->user_id = $user->id;
        $newArticle->save();

        // Para esta actividad, podemos devolver texto plano (sin vista)
        return response()->json([
            'all_articles_count' => $allArticles->count(),
            'first_article'      => $firstArticle,
            'user_articles_count'=> $userArticles->count(),
            'new_article'        => $newArticle,
        ]);
    }
}
