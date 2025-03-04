<form method="POST" action="{{ route('mensagens.store') }}" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="atendimento_id" value="{{ $atendimento->id }}">

    <div class="mt-4">
        <x-input-label for="mensagem" :value="__('Mensagem')" />
        <textarea id="mensagem" name="mensagem" class="block mt-1 w-full" style="background-color: #111827; color: white;" required>{{ old('mensagem') }}</textarea>
        <x-input-error :messages="$errors->get('mensagem')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="anexo" :value="__('Anexo (opcional)')" />
        <input type="file" id="anexo" name="anexo" class="block mt-1 w-full" accept="image/*,application/pdf,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
        <x-input-error :messages="$errors->get('anexo')" class="mt-2" />
        <p class="text-sm text-gray-500 mt-1">Tipos de arquivo permitidos: imagens, PDF, Excel.</p>
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ml-4">
            {{ __('Enviar') }}
        </x-primary-button>
    </div>
</form>
