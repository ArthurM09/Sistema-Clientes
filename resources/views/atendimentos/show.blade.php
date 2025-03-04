<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes do Atendimento') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 text-gray-900 dark:text-gray-100">
                    <!-- Seção do Atendimento -->
                    <div class="mb-8 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex justify-between items-center pb-6 border-b border-gray-200 dark:border-gray-700">
                            <div>
                                <h2 class="text-2xl font-bold tracking-tight">{{ $atendimento->assunto }}</h2>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Criado em {{ $atendimento->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('atendimentos.edit', $atendimento->id) }}" class="inline-flex items-center px-4 py-2" style="background-color: #22c55e !important; border-color: transparent; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; color: white; transition: all 0.15s ease-in-out" onmouseover="this.style.backgroundColor='#16a34a'" onmouseout="this.style.backgroundColor='#22c55e'">Editar</a>
                                <form action="{{ route('atendimentos.destroy', $atendimento) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-4 py-2" style="background-color: #ef4444 !important; border-color: transparent; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; color: white; transition: all 0.15s ease-in-out;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'" onclick="return confirm('Tem certeza que deseja excluir este atendimento?')">Excluir</button>
                                </form>
                            </div>
                        </div>

                        <div class="mt-8 mb-4">
                            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach([
                                    ['label' => 'Projeto', 'value' => $atendimento->projeto->name, 'icon' => 'fa-project-diagram'],
                                    ['label' => 'Status', 'value' => $atendimento->status, 'icon' => 'fa-tasks'],
                                    ['label' => 'Descrição', 'value' => $atendimento->descricao, 'icon' => 'fa-file-alt'],
                                ] as $item)
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $item['label'] }}</label>
                                        <p class="prose dark:prose-invert max-w-none">
                                            <i class="fas {{ $item['icon'] }} mr-2 text-gray-400"></i>
                                            {{ $item['value'] }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Seção de Mensagens -->
                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-6 mt-6">
                        <h3 class="text-xl font-semibold pb-4 border-b border-gray-200 dark:border-gray-700">Mensagens</h3>

                        @foreach ($atendimento->mensagens as $mensagem)
                            <div class="border rounded p-4 mb-4 mt-4">
                                <p>{{ $mensagem->mensagem }}</p>

                                @if ($mensagem->anexo)
                                    <p class="mt-2">
                                        <a href="{{ Storage::disk('public')->url($mensagem->anexo) }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline">
                                            <i class="fas fa-paperclip mr-2"></i>Baixar Anexo
                                        </a>
                                    </p>
                                @endif

                                <p class="text-sm text-gray-500 mt-2">
                                    <i class="fas fa-user-circle mr-2"></i>
                                    {{ $mensagem->user ? $mensagem->user->name : 'Visitante' }} em {{ $mensagem->created_at->format('d/m/Y H:i') }}
                                </p>

                                @if ($mensagem->user_id === Auth::id())
                                    <div class="mt-2 flex gap-2">
                                        <a href="{{ route('mensagens.edit', $mensagem) }}" class="inline-flex items-center px-2 py-1 text-sm" style="background-color: #22c55e !important; color: white; border-radius: 0.25rem;">Editar</a>
                                        <form action="{{ route('mensagens.destroy', $mensagem) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-2 py-1 text-sm" style="background-color: #ef4444 !important; color: white; border-radius: 0.25rem;" onclick="return confirm('Tem certeza que deseja excluir esta mensagem?')">Excluir</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                        <div class="mt-8 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <h4 class="text-lg font-medium mb-4">Nova Mensagem</h4>
                            @include('mensagens.create', ['atendimento' => $atendimento])
                        </div>
                    </div>

                    <div class="mt-8 border-gray-200 dark:border-gray-700 pt-6">
                        <a href="{{ route('atendimentos.index') }}" class="inline-flex items-center px-4 py-2" style="background-color: #0ea5e9 !important; border-color: transparent; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; color: white; transition: all 0.15s ease-in-out" onmouseover="this.style.backgroundColor='#0284c7'" onmouseout="this.style.backgroundColor='#0ea5e9'">Voltar para lista de atendimentos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
