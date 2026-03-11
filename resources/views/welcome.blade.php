<x-layout title="Home">
    {{$greeting}}, {{$person}}
    <br>
    @if (count($tasks))
        <p>Tenemos {{count($tasks)}} frutas</p>
    @else
        
    @endif
</x-layout>