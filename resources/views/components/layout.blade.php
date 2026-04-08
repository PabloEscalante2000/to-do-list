@props([
    'title' => 'To Do List',
])

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List — {{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 text-gray-800">

    <nav class="bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-3xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ route('ideas.index') }}" class="text-xl font-bold text-indigo-600 tracking-tight">
                ✅ To Do List
            </a>
            <div class="flex items-center gap-4 text-sm font-medium text-gray-500">
                @can('view-admin')
                    <a href="/admin" class="hover:text-indigo-600 transition">Admin</a>
                @endcan
                @auth
                    <a href="{{ route('ideas.index') }}" class="hover:text-indigo-600 transition">Ideas</a>
                    
                    <a href="{{ route('ideas.create') }}"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                        + Nueva idea
                    </a> 
                @endauth
                @guest
                    <a href="/register"
                    class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition">
                        Registrar
                    </a>
                    <a href="/login"
                    class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition">
                        Log In
                    </a>
                @endguest

                @auth
                    <form id="logout-form" action="/logout" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition" type="submit">Cerrar Sesión</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-4 py-10">
        {{ $slot }}
    </main>

</body>
</html>
