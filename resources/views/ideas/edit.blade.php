<x-layout title="Editar Idea">

    <div class="mb-6">
        <a href="{{ route('ideas.show', $idea) }}" class="text-sm text-gray-500 hover:text-indigo-600 transition">
            ← Volver a la idea
        </a>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Editar Idea</h1>

        <form method="POST" action="{{ route('ideas.update', $idea) }}" class="space-y-5">
            @csrf
            @method('PATCH')

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Descripción
                </label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-none @error('description') border-red-500 @enderror"
                >{{ old('description', $idea->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="state" class="block text-sm font-medium text-gray-700 mb-2">
                    Estado
                </label>
                <select
                    id="state"
                    name="state"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('state') border-red-500 @enderror"
                >
                    <option value="pending"     {{ old('state', $idea->state) === 'pending'     ? 'selected' : '' }}>Pendiente</option>
                    <option value="in_progress" {{ old('state', $idea->state) === 'in_progress' ? 'selected' : '' }}>En progreso</option>
                    <option value="completed"   {{ old('state', $idea->state) === 'completed'   ? 'selected' : '' }}>Completada</option>
                </select>
                @error('state')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="flex-1 bg-indigo-600 text-white py-3 rounded-lg font-medium hover:bg-indigo-700 transition">
                    Guardar cambios
                </button>

                <a href="{{ route('ideas.show', $idea) }}"
                   class="flex-1 text-center border border-gray-300 text-gray-600 py-3 rounded-lg font-medium hover:bg-gray-50 transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>

    <div class="mt-4">
        <form method="POST" action="{{ route('ideas.destroy', $idea) }}"
              onsubmit="return confirm('¿Eliminar esta idea? Esta acción no se puede deshacer.')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="w-full border border-red-300 text-red-500 py-3 rounded-lg font-medium hover:bg-red-50 transition text-sm">
                Eliminar idea
            </button>
        </form>
    </div>

</x-layout>
