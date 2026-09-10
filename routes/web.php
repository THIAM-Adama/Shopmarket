<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

// Page d'accueil publique (Catalogue / Boutique)
Route::get('/', [HomeController::class, 'index'])->name('home');
// Page détail d'un produit (publique)
Route::get('/product/{product}', [HomeController::class, 'show'])->name('products.show');

// Routes accessibles uniquement aux utilisateurs connectés
Route::middleware(['auth'])->group(function () {

    // 1. Aiguillage automatique sur /dashboard selon le rôle
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        if (auth()->user()->role === 'vendeur') {
            return redirect()->route('seller.dashboard');
        }
        return view('buyer.dashboard');
    })->name('dashboard');

    // 2. Gestion du profil utilisateur (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 3. Espace réservé exclusivement aux Administrateurs
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('/admin/categories', CategoryController::class);
    });

    // 4. Espace réservé exclusivement aux Vendeurs
    Route::middleware('role:vendeur')->group(function () {
        Route::get('/seller/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard');
        Route::resource('/seller/products', ProductController::class)->names('seller.products');
    });

});

// Routes d'authentification (login, register, logout...)
require __DIR__.'/auth.php';