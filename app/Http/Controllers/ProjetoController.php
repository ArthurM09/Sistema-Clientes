<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\Cliente; 
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Para gerar o slug
use Illuminate\Support\Facades\Storage; // Para lidar com o upload de imagens

class ProjetoController extends Controller
{
    public function index()
    {
        $projetos = Projeto::with('cliente')->withoutTrashed()->get();
        return view('projetos.index', compact('projetos'));
    }

    public function create()
    {
        $clientes = Cliente::all(); 
        return view('projetos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clientes,id',
            'name' => 'required',
            'description' => 'nullable',
            'icone' => 'required|image',
            'initial_date' => 'required|date',
            'end_date' => 'nullable|date',
            'status' => 'required|in:pending,doing,done,canceled',
            'percent' => 'required|integer|min:0|max:100',
            'resp_nome' => 'required',
            'resp_email' => 'required|email',
            'resp_telefone' => 'nullable',
        ]);

        if ($request->hasFile('icone')) {
            $iconePath = $request->file('icone')->store('icones_projetos', 'public');
        } else {
            $iconePath = null;
        }

        Projeto::create([
            'client_id' => $request->client_id,
            'name' => $request->name,
            'description' => $request->description,
            'icone' => $iconePath,
            'slug' => Str::slug($request->name),
            'initial_date' => $request->initial_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'percent' => $request->percent,
            'resp_nome' => $request->resp_nome,
            'resp_email' => $request->resp_email,
            'resp_telefone' => $request->resp_telefone,
        ]);

        return redirect()->route('dashboard'); // Redireciona para o dashboard
    }

    public function show(Projeto $projeto)
    {
        return view('projetos.show', compact('projeto'));
    }

    public function edit(Projeto $projeto)
    {
        $clientes = Cliente::all(); // Para o dropdown na view de edição
        return view('projetos.edit', compact('projeto', 'clientes'));
    }

    public function update(Request $request, Projeto $projeto)
    {
        $request->validate([
            'client_id' => 'required|exists:clientes,id',
            'name' => 'required',
            'description' => 'nullable',
            'icone' => 'nullable|image', 
            'initial_date' => 'required|date',
            'end_date' => 'nullable|date',
            'status' => 'required|in:pending,doing,done,canceled',
            'percent' => 'required|integer|min:0|max:100',
            'resp_nome' => 'required',
            'resp_email' => 'required|email',
            'resp_telefone' => 'nullable',
        ]);

        if ($request->hasFile('icone')) {
            // Exclui a imagem antiga, se existir
            if ($projeto->icone) {
                Storage::disk('public')->delete($projeto->icone);
            }
            $iconePath = $request->file('icone')->store('icones_projetos', 'public');
            $projeto->icone = $iconePath;
        }

        $projeto->update($request->except('icone')); // Atualiza os outros campos

        return redirect()->route('dashboard'); // Redireciona para o dashboard
    }

    public function destroy(Projeto $projeto)
    {
        if ($projeto->icone) {
            Storage::disk('public')->delete($projeto->icone);
        }
        $projeto->delete();
        return redirect()->route('dashboard'); // Redireciona para o dashboard
    }
}
