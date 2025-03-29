<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Muestra la lista de artículos con paginación.
     */
    public function index()
    {
        $articles = Article::paginate(10); // O Article::all() si no quieres paginación
        return view('articles.index', compact('articles'));
    }
    

    /**
     * Muestra el formulario para crear un nuevo artículo.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('blog.create', compact('categories'));
    }

    /**
     * Almacena un nuevo artículo en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:blog_categories,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $article = new Article($request->all());

        // Guardar imagen si se sube
        if ($request->hasFile('image')) {
            $article->image = $request->file('image')->store('articles', 'public');
        }

        $article->save();

        return redirect()->route('blog.index')->with('success', 'Artículo creado correctamente.');
    }

    /**
     * Muestra los detalles de un artículo específico.
     */
    public function show(Article $article)
    {
        return view('blog.show', compact('article'));
    }

    /**
     * Muestra el formulario para editar un artículo.
     */
    public function edit(Article $article)
    {
        $categories = BlogCategory::all();
        return view('blog.edit', compact('article', 'categories'));
    }

    /**
     * Actualiza un artículo en la base de datos.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:blog_categories,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $article->fill($request->all());

        // Guardar nueva imagen si se sube
        if ($request->hasFile('image')) {
            $article->image = $request->file('image')->store('articles', 'public');
        }

        $article->save();

        return redirect()->route('blog.index')->with('success', 'Artículo actualizado correctamente.');
    }

    /**
     * Elimina un artículo.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('blog.index')->with('success', 'Artículo eliminado correctamente.');
    }
}
