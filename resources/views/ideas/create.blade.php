<x-layout title="Nueva Idea">

    <div class="mb-6">
        <a href="{{ route('ideas.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 transition">
            ← Volver a mis ideas
        </a>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Nueva Idea</h1>

        <form method="POST" action="{{ route('ideas.store') }}" class="space-y-5">
            @csrf
            <input type="hidden" name="state" value="pending">
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Descripción
                </label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-none @error('description') border-red-500 @enderror"
                    placeholder="¿Qué tienes en mente?"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 text-white py-3 rounded-lg font-medium hover:bg-indigo-700 transition">
                Guardar idea
            </button>
        </form>
    </div>

</x-layout>
