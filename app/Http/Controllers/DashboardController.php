<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Projeto;

class DashboardController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        $projetos = Projeto::with('cliente')->get(); // Eager loading para evitar o problema N+1
        return view('dashboard', compact('clientes', 'projetos'));
    }
}