<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
        $nomes = ['Maicon', 'Vieira', "De Oliveira", "Josefa"];
        $idades = [31, 32, 27, 28, 30];
    
        return view('welcome', [
            'nomes' => $nomes,
            'idades' => $idades
        ]); 
    }

    public function create() {
        return view('events.create');
    }

    public function login() {
        return view('events.login');
    }

    public function register() {
        return view('events.register');
    }
}
