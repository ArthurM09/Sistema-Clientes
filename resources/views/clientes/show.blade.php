<h1>Visualizar Cliente</h1>

<p><strong>Nome:</strong> {{ $cliente->nome }}</p>
<p><strong>CNPJ/CPF:</strong> {{ $cliente->cnpj_cpf }}</p>
<p><strong>Contato:</strong> {{ $cliente->contato }}</p>
<p><strong>Email:</strong> {{ $cliente->email }}</p>
<p><strong>Whatsapp:</strong> {{ $cliente->whatsapp }}</p>
<p><strong>Rua:</strong> {{ $cliente->endereco_rua }}</p>
<p><strong>Número:</strong> {{ $cliente->endereco_numero }}</p>
<p><strong>Complemento:</strong> {{ $cliente->endereco_complemento }}</p>
<p><strong>Bairro:</strong> {{ $cliente->endereco_bairro }}</p>
<p><strong>CEP:</strong> {{ $cliente->endereco_cep }}</p>
<p><strong>Cidade:</strong> {{ $cliente->endereco_cidade }}</p>
<p><strong>Estado:</strong> {{ $cliente->endereco_estado }}</p>


<a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>

<form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>