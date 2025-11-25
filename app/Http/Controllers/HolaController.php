<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolaController extends Controller
{
    public function index()
    {
        // Saludo sin nombre
        $mensaje = 'Hola, mundo';
        return view('hola', ['mensaje' => $mensaje]);
    }

    public function show($nombre)
    {
        // Saludo con nombre
        $mensaje = "Hola, $nombre";
        return view('hola', ['mensaje' => $mensaje]);
    }

     public function articles()
    {
        // Valores fijos de prueba
        $id = 1;
        $username = 'María';
        $articles = [
            'Mi primer artículo en Laravel',
            'Cómo usar Blade paso a paso',
            'Docker y Sail para principiantes',
        ];

        // Pasamos los datos a la vista
        return view('articles.page', compact('id', 'username', 'articles'));
    }
}

