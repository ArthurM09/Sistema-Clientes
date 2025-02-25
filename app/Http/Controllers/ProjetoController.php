<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\Cliente; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

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
            'icone' => 'required|image', //Valida que o arquivo é uma imagem
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

        $name = $request->input('name');
        $slug = $this->generateInitialsSlug($name); // Chama a função para gerar o slug


        Projeto::create([
            'client_id' => $request->client_id,
            'name' => $request->name,
            'description' => $request->description,
            'icone' => $iconePath,
            'slug' => $slug,
            'initial_date' => $request->initial_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'percent' => $request->percent,
            'resp_nome' => $request->resp_nome,
            'resp_email' => $request->resp_email,
            'resp_telefone' => $request->resp_telefone,
        ]);

        return redirect()->route('projetos.index');
    }

    public function show(Projeto $projeto)
    {
        return view('projetos.show', compact('projeto'));
    }

    public function edit(Projeto $projeto)
    {
        $clientes = Cliente::all(); 
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

        // Verifica se o nome foi alterado
        if ($request->has('name') && $request->input('name') !== $projeto->name) { 
            $projeto->slug = $this->generateInitialsSlug($request->input('name'));
        }

        $projeto->update($request->except('icone')); // Atualiza os outros campos

        return redirect()->route('projetos.index');
    }

    public function destroy(Projeto $projeto)
    {
        if ($projeto->icone) {
            Storage::disk('public')->delete($projeto->icone);
        }
        $projeto->delete();
        return redirect()->route('projetos.index');
    }

    private function generateInitialsSlug($name)
    {
        $words = explode(' ', $name); // Divide o nome em palavras
        $initials = '';

        foreach ($words as $word) {
            $initials .= strtoupper($word[0]); // Pega a primeira letra de cada palavra e converte para maiúscula
        }

        return $initials;
    }
}
