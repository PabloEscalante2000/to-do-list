<x-layout title="Home">
    hello world!
    <form class="p-5 space-y-2" method="POST" action="/ideas/{{$idea->id}}">
        @csrf
        @method("PATCH")
        <label for="about" class="text-xl block">New Idea</label>
        <textarea name="about" class="border-red-600 bg-amber-50">{{$idea->description}}</textarea>
        <br>
        <label for="state">Estado:</label>
        <input name="state" type="text" class="border-red-300 bg-gray-200" value="{{$idea->state}}"/>
        <button type="submit" class="block bg-purple-300 p-3">Update</button>
        <button type="submit" form="delete-idea-form" class="block bg-red-300 p-3">Delete</button>
    </form>
    <form id="delete-idea-form" method="POST" action="/ideas/{{$idea->id}}">
        @csrf
        @method("DELETE")

    </form>
</x-layout>