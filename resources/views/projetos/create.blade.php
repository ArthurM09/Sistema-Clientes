<h1>Criar Projeto</h1>

<form action="{{ route('projetos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="client_id">Cliente:</label>
    <select name="client_id" id="client_id" required>
        @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}">{{ $cliente->id }}</option>
        @endforeach
    </select><br>

    <!-- Outros campos do formulário -->
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" required><br>

    <label for="description">Descrição:</label>
    <textarea name="description" id="description"></textarea><br>

    <label for="icone">Ícone:</label>
    <input type="file" name="icone" id="icone" required><br>

    <label for="initial_date">Data Inicial:</label>
    <input type="date" name="initial_date" id="initial_date" required><br>

    <label for="end_date">Data Final:</label>
    <input type="date" name="end_date" id="end_date"><br>

    <label for="status">Status:</label>
    <select name="status" id="status" required>
        <option value="pending">Pending</option>
        <option value="doing">Doing</option>
        <option value="done">Done</option>
        <option value="canceled">Canceled</option>
    </select><br>

    <label for="percent">Percentual:</label>
    <input type="number" name="percent" id="percent" min="0" max="100" required><br>

    <label for="whatsapp">Whatsapp:</label>
    <input type="text" name="whatsapp" id="whatsapp"><br>

    <label for="resp_nome">Nome do Responsável:</label>
    <input type="text" name="resp_nome" id="resp_nome" required><br>

    <label for="resp_email">Email do Responsável:</label>
    <input type="email" name="resp_email" id="resp_email" required><br>

    <label for="resp_telefone">Telefone do Responsável:</label>
    <input type="text" name="resp_telefone" id="resp_telefone"><br>

    <button type="submit">Salvar</button>
</form>
