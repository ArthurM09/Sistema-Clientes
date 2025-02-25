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
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg mb-10">
            <h1 class="text-2xl font-bold text-center mb-4 text-gray-400">Novo Cliente</h1>

            <form method="POST" action="{{ route('clientes.store') }}">
                @csrf

                <div>
                    <x-input-label for="nome" :value="__('Nome')" />
                    <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus />
                    <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="cnpj_cpf" :value="__('CNPJ/CPF')" />
                    <x-text-input id="cnpj_cpf" class="block mt-1 w-full" type="text" name="cnpj_cpf" :value="old('cnpj_cpf')" required />
                    <x-input-error :messages="$errors->get('cnpj_cpf')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4 flex">
                    <div class="w-1/2 mr-2">
                        <x-input-label for="contato" :value="__('Contato')" />
                        <x-text-input id="contato" class="block mt-1 w-full" type="text" name="contato" :value="old('contato')" />
                        <x-input-error :messages="$errors->get('contato')" class="mt-2" />
                    </div>
                    <div class="w-1/2">
                        <x-input-label for="whatsapp" :value="__('Whatsapp')" />
                        <x-text-input id="whatsapp" class="block mt-1 w-full" type="text" name="whatsapp" :value="old('whatsapp')" />
                        <x-input-error :messages="$errors->get('whatsapp')" class="mt-2" />
                    </div>
                </div>

                <div class="mt-4">
                    <x-input-label for="endereco_rua" :value="__('Rua')" />
                    <x-text-input id="endereco_rua" class="block mt-1 w-full" type="text" name="endereco_rua" :value="old('endereco_rua')" required />
                    <x-input-error :messages="$errors->get('endereco_rua')" class="mt-2" />
                </div>

                <div class="mt-4 flex">
                    <div class="w-1/2 mr-2">
                        <x-input-label for="endereco_numero" :value="__('Número')" />
                        <x-text-input id="endereco_numero" class="block mt-1 w-full" type="text" name="endereco_numero" :value="old('endereco_numero')" required />
                        <x-input-error :messages="$errors->get('endereco_numero')" class="mt-2" />
                    </div>
                    <div class="w-1/2">
                        <x-input-label for="endereco_complemento" :value="__('Complemento')" />
                        <x-text-input id="endereco_complemento" class="block mt-1 w-full" type="text" name="endereco_complemento" :value="old('endereco_complemento')" />
                        <x-input-error :messages="$errors->get('endereco_complemento')" class="mt-2" />
                    </div>
                </div>

                 <div class="mt-4">
                    <x-input-label for="endereco_bairro" :value="__('Bairro')" />
                    <x-text-input id="endereco_bairro" class="block mt-1 w-full" type="text" name="endereco_bairro" :value="old('endereco_bairro')" required />
                    <x-input-error :messages="$errors->get('endereco_bairro')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="endereco_cidade" :value="__('Cidade')" />
                    <x-text-input id="endereco_cidade" class="block mt-1 w-full" type="text" name="endereco_cidade" :value="old('endereco_cidade')" required />
                    <x-input-error :messages="$errors->get('endereco_cidade')" class="mt-2" />
                </div>

                <div class="mt-4 flex">
                    <div class="w-1/2 mr-2">
                        <x-input-label for="endereco_cep" :value="__('CEP')" />
                        <x-text-input id="endereco_cep" class="block mt-1 w-full" type="text" name="endereco_cep" :value="old('endereco_cep')" required />
                        <x-input-error :messages="$errors->get('endereco_cep')" class="mt-2" />
                    </div>
                    <div class="w-1/2">
                        <x-input-label for="endereco_estado" :value="__('Estado')" />
                        <x-text-input id="endereco_estado" class="block mt-1 mb-6 w-full" type="text" name="endereco_estado" :value="old('endereco_estado')" required />
                        <x-input-error :messages="$errors->get('endereco_estado')" class="mt-2" />
                    </div>
                </div>

                <div class="flex items-center justify-center mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Cadastrar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
