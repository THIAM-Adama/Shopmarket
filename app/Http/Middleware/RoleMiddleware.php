<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Gère une requête entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  (Le rôle attendu transmis depuis la route)
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. On vérifie si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect('/login'); // Sinon on le renvoie à la connexion
        }

        // 2. On vérifie si le rôle de l'utilisateur correspond au rôle exigé par la route
        if (Auth::user()->role !== $role) {
            abort(403, 'Accès non autorisé : Vous n\'avez pas le rôle requis.'); // Bloque l'accès avec une page 403
        }

        // 3. Tout est OK, on laisse passer la requête vers l'étape suivante
        return $next($request);
    }
}