<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes do Projeto') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 text-gray-900 dark:text-gray-100">
                    <!-- Cabeçalho com ações -->
                    <div class="flex justify-between items-center pb-6 border-b border-gray-200 dark:border-gray-700">
                        <div>
                            <h2 class="text-2xl font-bold tracking-tight">{{ $projeto->name }}</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Criado em {{ \Carbon\Carbon::parse($projeto->created_at)->format('d/m/Y H:i') }}</p>
                        </div>
                        <div class="flex gap-3">
                            <a href="{{ route('projetos.edit', $projeto->id) }}" class="inline-flex items-center px-4 py-2" style="background-color: #22c55e !important; border-color: transparent; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; color: white; transition: all 0.15s ease-in-out" onmouseover="this.style.backgroundColor='#16a34a'" onmouseout="this.style.backgroundColor='#22c55e'">Editar</a>
                            <form action="{{ route('projetos.destroy', $projeto) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-4 py-2" style="background-color: #ef4444 !important; border-color: transparent; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; color: white; transition: all 0.15s ease-in-out;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'" onclick="return confirm('Tem certeza que deseja excluir este projeto?')">Excluir</button>
                            </form>
                        </div>
                    </div>

                    <!-- Conteúdo principal -->
                    <div class="space-y-8 mt-8">

                        <!-- Seção de Informações Gerais -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Status e Percentual -->
                            <div class="mt-6 space-y-2">
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</label>
                                <p class="prose dark:prose-invert max-w-none">
                                    <i class="fas fa-tasks mr-2 text-blue-500"></i>
                                    {{ $projeto->status }} - {{ $projeto->percent }}%
                                </p>
                            </div>

                            <!-- Cliente -->
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Cliente</label>
                                <p class="prose dark:prose-invert max-w-none">
                                    <i class="fas fa-user-tie mr-2 text-green-500"></i>
                                    {{ $projeto->cliente->id }}
                                </p>
                            </div>

                            <!-- Período -->
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Período</label>
                                <p class="prose dark:prose-invert max-w-none">
                                    <i class="fas fa-calendar-alt mr-2 text-purple-500"></i>
                                    {{ \Carbon\Carbon::parse($projeto->initial_date)->format('d/m/Y') }} 
                                    <span class="mx-1">-</span> 
                                    {{ \Carbon\Carbon::parse($projeto->end_date)->format('d/m/Y') }}
                                </p>
                            </div>

                            <!-- Slug -->
                            <div class="mb-6 space-y-2">
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Slug</label>
                                <p class="prose dark:prose-invert max-w-none">
                                    <i class="fas fa-link mr-2 text-yellow-500"></i>
                                    {{ $projeto->slug }}
                                </p>
                            </div>
                        </div>

                        <!-- Ícone -->
                        <div class="mb-2 space-y-2">
                            <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Ícone</label>
                            <div class="prose dark:prose-invert max-w-none">
                                @if ($projeto->icone)
                                    <img src="{{ Storage::url($projeto->icone) }}" alt="{{ $projeto->name }} Ícone" width="400" height="400" class="mb-2">
                                @else
                                    Sem ícone
                                @endif
                            </div>
                        </div>

                        <!-- Seção de Descrição -->
                        <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                            <h3 class="text-lg font-semibold mb-4">Descrição do Projeto</h3>
                            <div class="prose dark:prose-invert max-w-none">
                                {!! nl2br(e($projeto->description)) !!}
                            </div>
                        </div>

                        <!-- Seção do Responsável -->
                        <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-6">
                            <h3 class="text-lg font-semibold mb-4">Responsável</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="space-y-1">
                                    <label class="text-sm text-gray-500 dark:text-gray-400">Nome</label>
                                    <p class="prose dark:prose-invert max-w-none">{{ $projeto->resp_nome }}</p>
                                </div>
                                <div class="space-y-1">
                                    <label class="text-sm text-gray-500 dark:text-gray-400">E-mail</label>
                                    <p class="prose dark:prose-invert max-w-none">{{ $projeto->resp_email }}</p>
                                </div>
                                <div class="mb-4 space-y-1">
                                    <label class="text-sm text-gray-500 dark:text-gray-400">Telefone</label>
                                    <p class="prose dark:prose-invert max-w-none">{{ $projeto->resp_telefone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botão Voltar -->
                    <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-6">
                        <a href="{{ route('projetos.index') }}" class="inline-flex items-center px-4 py-2" style="background-color: #0ea5e9 !important; border-color: transparent; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; color: white; transition: all 0.15s ease-in-out" onmouseover="this.style.backgroundColor='#0284c7'" onmouseout="this.style.backgroundColor='#0ea5e9'">Voltar para lista de projetos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
