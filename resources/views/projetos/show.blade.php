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
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <h1 class="text-2xl font-bold text-center mb-4">{{ $projeto->name }}</h1>

            <div>
                <x-input-label :value="__('Cliente')" />
                <p>{{ $projeto->cliente->nome }}</p>
            </div>

            <div class="mt-4">
                <x-input-label :value="__('Descrição')" />
                <p>{{ $projeto->description }}</p>
            </div>

            <div class="mt-4">
                <x-input-label :value="__('Ícone')" />
                @if ($projeto->icone)
                    <img src="{{ Storage::url($projeto->icone) }}" alt="{{ $projeto->name }} Ícone" width="100" class="mb-2">
                @endif
            </div>

            <div class="mt-4">
                <x-input-label :value="__('Data Inicial')" />
                <p>{{ $projeto->initial_date }}</p>
            </div>

            <div class="mt-4">
                <x-input-label :value="__('Data Final')" />
                <p>{{ $projeto->end_date }}</p>
            </div>

            <div class="mt-4">
                <x-input-label :value="__('Status')" />
                <p>{{ $projeto->status }}</p>
            </div>

            <!-- ... (outros campos) ... -->
            <div class="mt-4">
                <x-input-label :value="__('Percentual')" />
                <p>{{ $projeto->percent }}</p>
            </div>
            
            <div class="mt-4">
                <x-input-label :value="__('Nome do Responsável')" />
                <p>{{ $projeto->resp_nome }}</p>
            </div>

            <div class="mt-4">
                <x-input-label :value="__('Email do Responsável')" />
                <p>{{ $projeto->resp_email }}</p>
            </div>

            <div class="mt-4">
                <x-input-label :value="__('Telefone do Responsável')" />
                <p>{{ $projeto->resp_telefone }}</p>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('projetos.edit', $projeto) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('projetos.destroy', $projeto) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
