<x-layout>
    <form class="p-5" method="POST">
        @csrf
        <label for="about" class="text-xl block">New Idea</label>
        <textarea name="about" class="border-red-600 bg-amber-50"></textarea>
        <button class="block bg-amber-300 p-3">Submit</button>
    </form>
</x-layout>