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
            <h1 class="text-2xl font-bold text-center mb-4 text-gray-400">Editar Projeto</h1>

            <form method="POST" action="{{ route('projetos.update', $projeto) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="client_id" :value="__('Cliente')" />
                    <select name="client_id" id="client_id" class="block mt-1 w-full" required>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ old('client_id', $projeto->client_id) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="name" :value="__('Nome')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $projeto->name)" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="description" :value="__('Descrição')" />
                    <textarea id="description" name="description" class="block mt-1 w-full">{{ old('description', $projeto->description) }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="icone" :value="__('Ícone')" />
                    @if ($projeto->icone)
                        <img src="{{ Storage::url($projeto->icone) }}" alt="{{ $projeto->name }} Ícone" width="100" class="mb-2">
                    @endif
                    <input type="file" id="icone" name="icone" class="block mt-1 w-full" accept="image/jpeg, image/png, image/gif, image/svg+xml">
                    <x-input-error :messages="$errors->get('icone')" class="mt-2" />
                    <p class="text-sm text-gray-500 mt-1">Tipos de arquivo permitidos: JPEG, PNG, GIF, SVG.</p>
                </div>

                <div class="mt-4 flex justify-between w-full">
                    <div>
                        <x-input-label for="initial_date" :value="__('Data Inicial')" />
                        <x-text-input id="initial_date" class="block mt-1 w-full" type="date" name="initial_date" :value="old('initial_date', $projeto->initial_date)" required />
                        <x-input-error :messages="$errors->get('initial_date')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="end_date" :value="__('Data Final')" />
                        <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date', $projeto->end_date)" />
                        <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                    </div>
                </div>

                <div class="mt-4 flex justify-between w-full">
                    <div>
                        <x-input-label for="status" :value="__('Status')" />
                        <select name="status" id="status" class="block mt-1 w-full" required>
                            <option value="pending" {{ old('status', $projeto->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="doing" {{ old('status', $projeto->status) == 'doing' ? 'selected' : '' }}>Doing</option>
                            <option value="done" {{ old('status', $projeto->status) == 'done' ? 'selected' : '' }}>Done</option>
                            <option value="canceled" {{ old('status', $projeto->status) == 'canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="percent" :value="__('Percentual')" />
                        <x-text-input id="percent" class="block mt-1 w-full" type="number" name="percent" :value="old('percent', $projeto->percent)" min="0" max="100" required />
                        <x-input-error :messages="$errors->get('percent')" class="mt-2" />
                    </div>
                </div>

                <div class="mt-4">
                    <x-input-label for="resp_nome" :value="__('Nome do Responsável')" />
                    <x-text-input id="resp_nome" class="block mt-1 w-full" type="text" name="resp_nome" :value="old('resp_nome', $projeto->resp_nome)" required />
                    <x-input-error :messages="$errors->get('resp_nome')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="resp_email" :value="__('Email do Responsável')" />
                    <x-text-input id="resp_email" class="block mt-1 w-full" type="email" name="resp_email" :value="old('resp_email', $projeto->resp_email)" required />
                    <x-input-error :messages="$errors->get('resp_email')" class="mt-2" />
                </div>

                <div class="mt-4 mb-6">
                    <x-input-label for="resp_telefone" :value="__('Telefone do Responsável')" />
                    <x-text-input id="resp_telefone" class="block mt-1 w-full" type="text" name="resp_telefone" :value="old('resp_telefone', $projeto->resp_telefone)" />
                    <x-input-error :messages="$errors->get('resp_telefone')" class="mt-2" />
                </div>

                <div class="flex items-center justify-center mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Atualizar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
