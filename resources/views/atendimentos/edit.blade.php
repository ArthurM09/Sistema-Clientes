<h1>Editar Atendimento</h1>

<form action="{{ route('atendimentos.update', $atendimento) }}" method="POST">
    @csrf
    @method('PUT')

    </div>

    <div class="mt-4">
        <x-input-label for="project_id" :value="__('Projeto')" />
        <select name="project_id" id="project_id" class="block mt-1 w-full" required style="background-color: #111827; color: white;">
            <option value="">Selecione um projeto</option>
            @foreach ($projetos as $projeto)
                <option value="{{ $projeto->id }}" {{ old('project_id', $atendimento->project_id) == $projeto->id ? 'selected' : '' }}>{{ $projeto->name }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('project_id')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="assunto" :value="__('Assunto')" />
        <x-text-input id="assunto" class="block mt-1 w-full" type="text" name="assunto" :value="old('assunto', $atendimento->assunto)" required autofocus style="background-color: #111827; color: white;"/>
        <x-input-error :messages="$errors->get('assunto')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="descricao" :value="__('Descrição')" />
        <textarea id="descricao" name="descricao" class="block mt-1 w-full" style="background-color: #111827; color: white;">{{ old('descricao', $atendimento->descricao) }}</textarea>
        <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="status" :value="__('Status')" />
        <select name="status" id="status" class="block mt-1 w-full" required style="background-color: #111827; color: white;">
            <option value="">Selecione o status</option>
            <option value="pending" {{ old('status', $atendimento->status) == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="closed" {{ old('status', $atendimento->status) == 'closed' ? 'selected' : '' }}>Closed</option>
            <option value="canceled" {{ old('status', $atendimento->status) == 'canceled' ? 'selected' : '' }}>Canceled</option>
            <option value="finalized" {{ old('status',$atendimento->status) == 'finalized' ? 'selected' : '' }}>Finalized</option>
        </select>
        <x-input-error :messages="$errors->get('status')" class="mt-2" />
    </div>

    <div class="flex items-center justify-center mt-4">
        <x-primary-button class="ml-4">
            {{ __('Atualizar') }}
        </x-primary-button>
    </div>
</form>
