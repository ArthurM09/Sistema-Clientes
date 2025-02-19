<h1>Editar Projeto</h1>

<form action="{{ route('projetos.update', $projeto) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!--  (os mesmos campos do create.blade.php, mas com os valores preenchidos) -->
    <label for="client_id">Cliente:</label>
    <select name="client_id" id="client_id" required>
        @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ $cliente->id == $projeto->client_id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
        @endforeach
    </select><br>

    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" value="{{ $projeto->name }}" required><br>

    <!-- ... (outros campos com values="$projeto->campo") ... -->
    <label for="icone">Ícone (opcional):</label> <br>
    <img src="{{ Storage::url($projeto->icone) }}" alt="{{ $projeto->name }} Ícone" width="100"> <br>
    <input type="file" name="icone" id="icone"><br>


    <button type="submit">Atualizar</button>
</form>
