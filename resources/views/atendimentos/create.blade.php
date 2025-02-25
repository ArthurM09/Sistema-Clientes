<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="number"],
        input[type="file"],
        textarea,
        select {
            background-color: #111827;
            color: white;
            border: 1px solid #374151;
            padding: 0.5rem;
            border-radius: 0.25rem;
        }

        select option[value=""] {
            color: gray;
        }

        select option:checked {
            background-color: #374151;
            color: white;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <h1 class="text-2xl font-bold text-center mb-4 text-gray-400">Novo Atendimento</h1>

            <form method="POST" action="{{ route('atendimentos.store') }}">
                @csrf

                <div>
                    <x-input-label for="project_id" :value="__('Projeto')" />
                    <select name="project_id" id="project_id" class="block mt-1 w-full" required>
                        <option value="">Selecione um projeto</option>
                        @foreach ($projetos as $projeto)
                            <option value="{{ $projeto->id }}" {{ old('project_id') == $projeto->id ? 'selected' : '' }}>{{ $projeto->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('project_id')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="assunto" :value="__('Assunto')" />
                    <x-text-input id="assunto" class="block mt-1 w-full" type="text" name="assunto" :value="old('assunto')" required autofocus />
                    <x-input-error :messages="$errors->get('assunto')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="descricao" :value="__('Descrição')" />
                    <textarea id="descricao" name="descricao" class="block mt-1 w-full">{{ old('descricao') }}</textarea>
                    <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                </div>

                <div class="mt-4 mb-6">
                    <x-input-label for="status" :value="__('Status')" />
                    <select name="status" id="status" class="block mt-1 w-full" required>
                        <option value="">Selecione o status</option>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                        <option value="canceled" {{ old('status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
                        <option value="finalized" {{ old('status') == 'finalized' ? 'selected' : '' }}>Finalized</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>

                <div class="flex items-center justify-center mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Criar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
