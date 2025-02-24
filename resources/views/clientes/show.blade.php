<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes do Cliente') }}
        </h1>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center pb-6 border-b border-gray-200 dark:border-gray-700">
                        <div>
                            <h2 class="text-2xl font-bold tracking-tight">{{ $cliente->nome }}</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Criado em {{ \Carbon\Carbon::parse($cliente->created_at)->format('d/m/Y H:i') }}</p>
                        </div>
                        <div class="flex gap-3">
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="inline-flex items-center px-4 py-2" style="background-color: #22c55e !important; border-color: transparent; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; color: white; transition: all 0.15s ease-in-out" onmouseover="this.style.backgroundColor='#16a34a'" onmouseout="this.style.backgroundColor='#22c55e'">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-4 py-2" style="background-color: #ef4444 !important; border-color: transparent; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; color: white; transition: all 0.15s ease-in-out;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</button>
                            </form>
                        </div>
                    </div>

                    <div class="mt-8 mb-4">
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach([
                                ['label' => 'CNPJ/CPF', 'value' => $cliente->cnpj_cpf, 'icon' => 'fa-id-card'],
                                ['label' => 'Contato', 'value' => $cliente->contato, 'icon' => 'fa-phone'],
                                ['label' => 'Email', 'value' => $cliente->email, 'icon' => 'fa-envelope'],
                                ['label' => 'Whatsapp', 'value' => $cliente->whatsapp, 'icon' => 'fa-whatsapp'],
                                ['label' => 'Endereço', 'value' => "{$cliente->endereco_rua}, {$cliente->endereco_numero} - {$cliente->endereco_bairro}, {$cliente->endereco_cidade} - {$cliente->endereco_estado}, CEP: {$cliente->endereco_cep}", 'icon' => 'fa-map-marker-alt'],
                            ] as $item)
                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $item['label'] }}</label>
                                    <p class="prose dark:prose-invert max-w-none">
                                        <i class="fas {{ $item['icon'] }} mr-2 text-gray-400"></i> {{-- Ícone --}}
                                        {{ $item['value'] }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-6">
                        <a href="{{ route('clientes.index') }}" class="inline-flex items-center px-4 py-2" style="background-color: #0ea5e9 !important; border-color: transparent; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; color: white; transition: all 0.15s ease-in-out" onmouseover="this.style.backgroundColor='#0284c7'" onmouseout="this.style.backgroundColor='#0ea5e9'">Voltar para lista de clientes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
