<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\Article;



class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::all();
        $articles = Article::latest()->paginate(5); // Cargar últimos artículos
    
        return view('blog_categories.index', compact('categories', 'articles'));
    }
    


    // Mostrar formulario de creación
    public function create()
    {
        return view('blog_categories.create');
    }

    // Guardar categoría
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        BlogCategory::create($request->all());

        return redirect()->route('blog_categories.index')->with('success', 'Categoría creada con éxito.');
    }

    // Mostrar formulario de edición
    public function edit(BlogCategory $blogCategory)
    {
        return view('blog_categories.edit', compact('blogCategory'));
    }

    // Actualizar categoría
    public function update(Request $request, BlogCategory $blogCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $blogCategory->update($request->all());

        return redirect()->route('blog_categories.index')->with('success', 'Categoría actualizada con éxito.');
    }

    // Eliminar categoría
    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();

        return redirect()->route('blog_categories.index')->with('success', 'Categoría eliminada con éxito.');
    }
}
