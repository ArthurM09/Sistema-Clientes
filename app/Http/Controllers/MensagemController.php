<?php

namespace App\Http\Controllers;

use App\Models\Mensagem;
use App\Models\Atendimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MensagemController extends Controller
{
    public function create(Atendimento $atendimento)
    {
        return view('mensagens.create', compact('atendimento'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'atendimento_id' => 'required|exists:atendimentos,id',
            'mensagem' => 'required|string',
            'anexo' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf,xls,xlsx',
        ]);

        $anexoPath = null;
        if ($request->hasFile('anexo')) {
            $anexoPath = $request->file('anexo')->store('anexos_mensagens', 'public');
        }

        Mensagem::create([
            'atendimento_id' => $request->atendimento_id,
            'user_id' => Auth::id(),
            'mensagem' => $request->mensagem,
            'anexo' => $anexoPath,
        ]);

        return redirect()->route('atendimentos.show', $request->atendimento_id);
    }


    public function edit(Mensagem $mensagem)
    {
        // Autorização (opcional): Verifique se o usuário atual pode editar a mensagem
        // Exemplo: if ($mensagem->user_id !== Auth::id()) { abort(403); }

        return view('mensagens.edit', compact('mensagem'));
    }

    public function update(Request $request, Mensagem $mensagem)
    {
        $request->validate([
            'mensagem' => 'required|string',
            'anexo' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf,xls,xlsx',
        ]);

        if ($request->hasFile('anexo')) {
            // Exclui o anexo antigo, se existir
            if ($mensagem->anexo) {
                Storage::disk('public')->delete($mensagem->anexo);
            }
            $anexoPath = $request->file('anexo')->store('anexos_mensagens', 'public');
            $mensagem->anexo = $anexoPath;
        }

        $mensagem->update([
            'mensagem' => $request->mensagem,
            // O anexo já foi atualizado acima, se necessário
        ]);

        return redirect()->route('atendimentos.show', $mensagem->atendimento_id);
    }

    public function destroy(Mensagem $mensagem)
    {
        // Autorização (opcional): Verifique se o usuário atual pode excluir a mensagem
        // Exemplo: if ($mensagem->user_id !== Auth::id()) { abort(403); }

        if ($mensagem->anexo) {
            Storage::disk('public')->delete($mensagem->anexo);
        }

        $atendimento_id = $mensagem->atendimento_id; // Guarda o ID do atendimento antes de excluir a mensagem
        $mensagem->delete();

        return redirect()->route('atendimentos.show', $mensagem->atendimento_id);
    }
}
