<?php

namespace App\Http\Controllers;
use App\Models\Cliente;

class DashboardController extends Controller
{
    public function index() {
        $clientes = Cliente::all();
        return view('dashboard', compact('clientes'));
    }
}