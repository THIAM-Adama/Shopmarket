<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Affiche le tableau de bord Vendeur.
     */
    public function dashboard()
    {
        return view('seller.dashboard');
    }
}