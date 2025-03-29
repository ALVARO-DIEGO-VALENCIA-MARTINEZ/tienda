<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\LowStockNotification;
use App\Http\Requests\ProductRequest;



class ProductController extends Controller
{
    /**
     * Muestra la lista de productos con opción de filtrado por categoría y paginación.
     */
    public function index(Request $request)
{
    $categories = Category::all();
    $query = Product::query();

    if ($request->has('category') && !empty($request->category)) {
        $query->where('category_id', $request->category);
    }

    $products = $query->paginate(10); // Asegúrate de que se está enviando correctamente

    return view('products.index', compact('products', 'categories'));
}

    /**
     * Muestra el formulario para crear un nuevo producto.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Almacena un nuevo producto en la base de datos.
     */
    public function store(ProductRequest $request)
    {
        $product = new Product($request->validated());

        // Guardar la imagen si se sube
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();

        // Si el stock es bajo, enviar notificación al administrador
        if ($product->stock < 5) {
            Mail::to('admin@example.com')->send(new LowStockNotification($product));
        }

        return redirect()->route('products.index')->with('success', 'Producto agregado correctamente.');
    }

    /**
     * Muestra los detalles de un producto específico.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Muestra el formulario para editar un producto existente.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Actualiza un producto en la base de datos.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->fill($request->validated());

        // Guardar la imagen si se sube una nueva
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();

        // Si el stock es bajo, enviar notificación al administrador
        if ($product->stock < 5) {
            Mail::to('admin@example.com')->send(new LowStockNotification($product));
        }

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Elimina un producto de la base de datos.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
}
