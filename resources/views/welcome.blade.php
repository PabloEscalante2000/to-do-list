<x-layout title="Home">
    hello world!
    <form class="p-5" method="POST" action="">
        @csrf
        <label for="about" class="text-xl block">New Idea</label>
        <textarea name="about" class="border-red-600 bg-amber-50"></textarea>
        <button class="block bg-amber-300 p-3">Submit</button>
    </form>
    <a href="/delete-ideas" class="p-5 block w-fit bg-red-400">Borrar Todo</a>
    <ul>
        @foreach ($ideas as $idea)
            <li>{{$idea}}</li>            
        @endforeach
    </ul>
</x-layout>