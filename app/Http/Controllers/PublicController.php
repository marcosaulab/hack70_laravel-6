<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function home() {
        return view('welcome');
    }

    public function profile() {
        $user = Auth::user();
        $comics = $user->comics; // ! questa è la funzione di relazione che ho definito nel model User
        return view('profile', compact('comics'));
    }
}
