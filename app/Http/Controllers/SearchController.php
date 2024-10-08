<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Agenda/Books');
    }

    public function index()
    {
        return Inertia::render('Books', [
            'user' => Auth::user(), // Pasar los datos del usuario autenticado
        ]);
    }
}
