<x-layout>
    <x-slot:title>Result save post</x-slot:title>

    <ul>
        @foreach($post as $item)
            <li>{{$item}}</li>
        @endforeach
    </ul>

</x-layout>
