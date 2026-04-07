<x-layout title="Registro">

    <div class="max-w-md mx-auto">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Crear cuenta</h1>

            <form action="/register" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Nombre
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('name') border-red-500 @enderror"
                        placeholder="Tu nombre"
                        required
                    >
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Correo electrónico
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('email') border-red-500 @enderror"
                        placeholder="correo@ejemplo.com"
                        required
                    >
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Contraseña
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('password') border-red-500 @enderror"
                        placeholder="••••••••"
                        required
                    >
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full bg-indigo-600 text-white py-3 rounded-lg font-medium hover:bg-indigo-700 transition">
                    Registrarse
                </button>
            </form>
        </div>
    </div>

</x-layout>
