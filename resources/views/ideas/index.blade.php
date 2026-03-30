<x-layout title="Mis Ideas">

    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Mis Ideas</h1>
        <a href="{{ route('ideas.create') }}"
           class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition text-sm font-medium">
            + Nueva idea
        </a>
    </div>

    @forelse ($ideas as $idea)
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

        <div class="bg-white border border-gray-200 rounded-xl p-5 mb-3 flex items-center justify-between shadow-sm hover:shadow-md transition">
            <div class="flex items-center gap-4">
                <span class="text-sm font-medium px-3 py-1 rounded-full border {{ $stateStyles }}">
                    {{ $stateLabel }}
                </span>
                <p class="text-gray-800 {{ $idea->state === 'completed' ? 'line-through text-gray-400' : '' }}">
                    {{ $idea->description }}
                </p>
            </div>
            <div class="flex items-center gap-2 shrink-0">
                <a href="{{ route('ideas.show', $idea) }}"
                   class="text-sm text-indigo-600 hover:underline">Ver</a>
                <a href="{{ route('ideas.edit', $idea) }}"
                   class="text-sm text-amber-600 hover:underline">Editar</a>
                <form method="POST" action="{{ route('ideas.destroy', $idea) }}"
                      onsubmit="return confirm('¿Eliminar esta idea?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm text-red-500 hover:underline">Eliminar</button>
                </form>
            </div>
        </div>
    @empty
        <div class="text-center py-20 text-gray-400">
            <p class="text-5xl mb-4">💡</p>
            <p class="text-lg">No hay ideas todavía.</p>
            <a href="{{ route('ideas.create') }}" class="text-indigo-600 hover:underline text-sm mt-2 inline-block">
                Crea la primera
            </a>
        </div>
    @endforelse

</x-layout>
