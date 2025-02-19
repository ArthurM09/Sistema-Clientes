<h1>Projetos</h1>

<a href="{{ route('projetos.create') }}">Criar Novo Projeto</a>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Cliente</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projetos as $projeto)
            <tr>
                <td>{{ $projeto->name }}</td>
                <td>{{ $projeto->cliente->nome }}</td> <!-- Acessa o nome do cliente relacionado -->
                <td>{{ $projeto->status }}</td>
                <td>
                    <a href="{{ route('projetos.show', $projeto) }}">Visualizar</a>
                    <a href="{{ route('projetos.edit', $projeto) }}">Editar</a>
                    <form action="{{ route('projetos.destroy', $projeto) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
