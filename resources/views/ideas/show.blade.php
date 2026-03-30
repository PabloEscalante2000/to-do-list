<x-layout title="{{ $idea->description }}">

    <div class="mb-6">
        <a href="{{ route('ideas.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 transition">
            ← Volver a mis ideas
        </a>
    </div>

    @php
        $stateStyles = match($idea->state) {
            'completed'   => 'bg-green-100 text-green-700 border-green-200',
            'in_progress' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
            default       => 'bg-gray-100 text-gray-500 border-gray-200',
        };
        $stateLabel = match($idea->state) {
            'completed'   => 'Completada',
            'in_progress' => 'En progreso',
            default       => 'Pendiente',
        };
    @endphp

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-8">
        <div class="flex items-start justify-between gap-4 mb-6">
            <h1 class="text-2xl font-bold text-gray-900 leading-snug {{ $idea->state === 'completed' ? 'line-through text-gray-400' : '' }}">
                {{ $idea->description }}
            </h1>
            <span class="shrink-0 text-sm font-medium px-3 py-1 rounded-full border {{ $stateStyles }}">
                {{ $stateLabel }}
            </span>
        </div>

        <p class="text-xs text-gray-400 mb-8">
            Creada {{ $idea->created_at->diffForHumans() }}
        </p>

        <div class="flex items-center gap-3">
            <a href="{{ route('ideas.edit', $idea) }}"
               class="bg-amber-500 text-white px-5 py-2 rounded-lg hover:bg-amber-600 transition text-sm font-medium">
                Editar
            </a>

            <form method="POST" action="{{ route('ideas.destroy', $idea) }}"
                  onsubmit="return confirm('¿Eliminar esta idea?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-500 text-white px-5 py-2 rounded-lg hover:bg-red-600 transition text-sm font-medium">
                    Eliminar
                </button>
            </form>
        </div>
    </div>

</x-layout>
