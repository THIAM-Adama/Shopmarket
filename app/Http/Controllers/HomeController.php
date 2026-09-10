<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        // Requête de base avec chargement de la catégorie liée
        $query = Product::with('category');

        // Filtre par catégorie si sélectionnée
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        // Filtre par mot-clé de recherche si saisi
        if ($request->has('search') && $request->search != '') {
            $query->where('nom', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->get();

        return view('welcome', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
    // Charge la catégorie et le vendeur associés au produit
    $product->load(['category', 'user']);
    return view('products.show', compact('product'));
    }
}