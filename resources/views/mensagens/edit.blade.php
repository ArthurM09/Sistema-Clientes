<form method="POST" action="{{ route('mensagens.update', $mensagem) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mt-4">
        <x-input-label for="mensagem" :value="__('Mensagem')" />
        <textarea id="mensagem" name="mensagem" class="block mt-1 w-full" style="background-color: #111827; color: white;" required>{{ old('mensagem', $mensagem->mensagem) }}</textarea>
        <x-input-error :messages="$errors->get('mensagem')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="anexo" :value="__('Anexo (opcional)')" />

        @if ($mensagem->anexo)
            <p class="text-sm text-gray-500">Anexo atual: <a href="{{ Storage::disk('public')->url($mensagem->anexo) }}" target="_blank">{{ basename($mensagem->anexo) }}</a></p>
        @endif

        <input type="file" id="anexo" name="anexo" class="block mt-1 w-full" accept="image/*,application/pdf,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
        <x-input-error :messages="$errors->get('anexo')" class="mt-2" />
        <p class="text-sm text-gray-500 mt-1">Tipos de arquivo permitidos: imagens, PDF, Excel.</p>
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ml-4">
            {{ __('Atualizar') }}
        </x-primary-button>
    </div>
</form>
