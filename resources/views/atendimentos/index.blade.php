<h1>Atendimentos</h1>

<a href="{{ route('atendimentos.create') }}" class="btn btn-primary mb-4">Novo Atendimento</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Assunto</th>
            <th>Projeto</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($atendimentos as $atendimento)
            <tr>
                <td>{{ $atendimento->assunto }}</td>
                <td>{{ $atendimento->projeto->name }}</td>
                <td>{{ $atendimento->status }}</td>
                <td>
                    <a href="{{ route('atendimentos.show', $atendimento) }}" class="btn btn-sm btn-info">Visualizar</a>
                    <a href="{{ route('atendimentos.edit', $atendimento) }}" class="btn btn-sm btn-primary">Editar</a>
                    <form action="{{ route('atendimentos.destroy', $atendimento) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este atendimento?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
