<x-layout title="Home">
    
    <a href="/delete-ideas" class="p-5 block w-fit bg-red-400">Borrar Todo</a>
    <ul>
        @forelse ($ideas as $idea)
            <li class="py-2 px-4 bg-blue-300 w-fit min-w-32 rounded-xl my-2 cursor-pointer">{{$idea->description}} - <a href="/ideas/{{$idea->id}}">ir</a></li>
        @empty
            <p>No ideas</p>
        @endforelse
    </ul>
</x-layout>