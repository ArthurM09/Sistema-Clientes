<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Visualizar Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-5">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Informações do Cliente</h3>
                    </div>

                    <dl class="mt-5 grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nome:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $cliente->nome }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">CNPJ/CPF:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $cliente->cnpj_cpf }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Contato:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $cliente->contato }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $cliente->email }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Whatsapp:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $cliente->whatsapp }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Rua:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $cliente->endereco_rua }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Número:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $cliente->endereco_numero }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Complemento:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $cliente->endereco_complemento }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Bairro:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $cliente->endereco_bairro }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">CEP:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $cliente->endereco_cep }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Cidade:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $cliente->endereco_cidade }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Estado:</dt>
                            <dd class "mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $cliente->endereco_estado }}</dd>
                        </div>
                    </dl>

                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="inline-flex items-center px-4 py-2" style="background-color: #22c55e !important; border-color: transparent; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; color: white; transition: all 0.15s ease-in-out" onmouseover="this.style.backgroundColor='#16a34a'" onmouseout="this.style.backgroundColor='#22c55e'">Editar</a>

                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline-block" style="margin-left: 10px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2" style="background-color: #ef4444 !important; border-color: transparent; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; color: white; transition: all 0.15s ease-in-out;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
