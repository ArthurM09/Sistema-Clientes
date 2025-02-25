<h1>Atendimento #{{ $atendimento->id }}</h1>

<p><strong>Projeto:</strong> {{ $atendimento->projeto->name }}</p>
<p><strong>Assunto:</strong> {{ $atendimento->assunto }}</p>
<p><strong>Descrição:</strong> {{ $atendimento->descricao }}</p>
<p><strong>Status:</strong> {{ $atendimento->status }}</p>

<a href="{{ route('atendimentos.edit', $atendimento) }}" class="btn btn-primary">Editar</a>

<form action="{{ route('atendimentos.destroy', $atendimento) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este atendimento?')">Excluir</button>
</form>
