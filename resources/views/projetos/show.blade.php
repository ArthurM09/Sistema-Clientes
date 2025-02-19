<h1>{{ $projeto->name }}</h1>

<p><strong>Cliente:</strong> {{ $projeto->cliente->nome }}</p>
<p><strong>Descrição:</strong> {{ $projeto->description }}</p>
<img src="{{ Storage::url($projeto->icone) }}" alt="{{ $projeto->name }} Ícone" width="100">
<p><strong>Slug:</strong> {{ $projeto->slug }}</p>
<p><strong>Data Inicial:</strong> {{ $projeto->initial_date }}</p>
<p><strong>Data Final:</strong> {{ $projeto->end_date }}</p>
<p><strong>Status:</strong> {{ $projeto->status }}</p>
<p><strong>Percentual:</strong> {{ $projeto->percent }}</p>
<p><strong>Whatsapp:</strong> {{ $projeto->whatsapp }}</p>
<p><strong>Responsável:</strong> {{ $projeto->resp_nome }} ({{ $projeto->resp_email }}, {{ $projeto->resp_telefone }})</p>

<a href="{{ route('projetos.edit', $projeto) }}">Editar</a>
<form action="{{ route('projetos.destroy', $projeto) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>
