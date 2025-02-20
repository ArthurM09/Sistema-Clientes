<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Visualizar Projeto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-5">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Informações do Projeto</h3>
                    </div>

                    <dl class="mt-5 grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nome:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $projeto->name }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Cliente:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $projeto->cliente->nome }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Descrição:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $projeto->description }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Ícone:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                @if ($projeto->icone)
                                    <img src="{{ Storage::url($projeto->icone) }}" alt="{{ $projeto->name }} Ícone" class="w-20 h-20 rounded-full">
                                @else
                                    Sem ícone
                                @endif
                            </dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Slug:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $projeto->slug }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Data Inicial:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $projeto->initial_date }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Data Final:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $projeto->end_date }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Status:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $projeto->status }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Percentual:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $projeto->percent }}%</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Whatsapp:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $projeto->whatsapp }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nome do Responsável:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $projeto->resp_nome }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email do Responsável:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $projeto->resp_email }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Telefone do Responsável:</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $projeto->resp_telefone }}</dd>
                        </div>
                    </dl>

                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('projetos.edit', $projeto->id) }}" class="inline-flex items-center px-4 py-2" style="background-color: #22c55e !important; border-color: transparent; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; color: white; transition: all 0.15s ease-in-out;" onmouseover="this.style.backgroundColor='#16a34a'" onmouseout="this.style.backgroundColor='#22c55e'">Editar</a>

                        <form action="{{ route('projetos.destroy', $projeto) }}" method="POST" class="inline-block" style="margin-left: 10px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2" style="background-color: #ef4444 !important; border-color: transparent; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; color: white; transition: all 0.15s ease-in-out;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'" onclick="return confirm('Tem certeza que deseja excluir este projeto?')">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
