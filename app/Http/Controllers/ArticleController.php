<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
{
    $articles = Article::with('author', 'category')->paginate(10); 
    return view('articles.index', compact('articles')); 
}


    public function create()
    {
        // Verificar que el usuario esté autenticado antes de mostrar el formulario
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para crear un artículo.');
        }

        $categories = BlogCategory::all();
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para realizar esta acción.');
        }

        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:blog_categories,id',
            'image' => 'nullable|image|max:2048'
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si la categoría existe
        $category = null;
        if ($request->category_id) {
            $category = BlogCategory::find($request->category_id);
            if (!$category) {
                return redirect()->back()->withErrors(['error' => 'Categoría no encontrada']);
            }
        }

        // Manejar la imagen si se subió
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        // Crear el artículo
        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => $user->id, // Se asegura de que el usuario está autenticado
            'category_id' => $category ? $category->id : null,
            'image' => $imagePath,
            'published_at' => now(),
        ]);

        return redirect()->route('articles.index')->with('success', 'Artículo creado correctamente.');
    }
}
