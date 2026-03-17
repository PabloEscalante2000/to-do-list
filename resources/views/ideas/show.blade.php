<x-layout>
    <div>
        <h1>Idea</h1>
        <p>{{$idea->description}}</p>
    </div>
    <div>
        <a href="/ideas/{{$idea->id}}/edit" class="px-4 py-2 rounded-md bg-purple-500 text-white shadow-2xs block w-fit">Editar</a>
    </div>
</x-layout>