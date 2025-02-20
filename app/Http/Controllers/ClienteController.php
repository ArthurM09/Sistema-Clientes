<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::withoutTrashed()->get();
        return view('clientes.index', compact('clientes'));
    }
    
    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        Cliente::create($request->all());
        return redirect()->route('dashboard'); // Redireciona para o dashboard
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente')); 
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return redirect()->route('dashboard'); // Redireciona para o dashboard
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('dashboard'); // Redireciona para o dashboard
    }
}
