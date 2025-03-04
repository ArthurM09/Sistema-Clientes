<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Projeto;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    public function index()
    {
        $atendimentos = Atendimento::with('projeto')->withoutTrashed()->get();
        return view('atendimentos.index', compact('atendimentos'));
    }

    public function create()
    {
        $projetos = Projeto::all();
        return view('atendimentos.create', compact('projetos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projetos,id',
            'assunto' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'status' => 'required|in:pending,closed,canceled,finalized',
        ]);

        Atendimento::create([
            'project_id' => $request->project_id,
            'assunto' => $request->assunto,
            'descricao' => $request->descricao,
            'status' => $request->status,
        ]);

        return redirect()->route('atendimentos.index');
    }

    public function show(Atendimento $atendimento)
    {
        $atendimento = Atendimento::with('mensagens')->find($atendimento->id);
        return view('atendimentos.show', compact('atendimento'));
    }

    public function edit(Atendimento $atendimento)
    {
        $projetos = Projeto::all();
        return view('atendimentos.edit', compact('atendimento', 'projetos'));
    }

    public function update(Request $request, Atendimento $atendimento)
    {
        $request->validate([
            'project_id' => 'required|exists:projetos,id',
            'assunto' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'status' => 'required|in:pending,closed,canceled,finalized',
        ]);
        
        $atendimento->update($request->all());

        return redirect()->route('atendimentos.index');
    }

    public function destroy(Atendimento $atendimento)
    {
        $atendimento->delete();
        return redirect()->route('atendimentos.index');
    }
}
