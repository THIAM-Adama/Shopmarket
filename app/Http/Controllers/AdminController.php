<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Affiche le tableau de bord Administrateur.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}