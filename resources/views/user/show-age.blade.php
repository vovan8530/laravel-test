<x-layout>
    <x-slot:title>Age title</x-slot:title>

    @unless($age >= 18) Age not validation
    @endunless

</x-layout>
