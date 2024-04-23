<x-layout>
    <x-slot:title>page title</x-slot:title>

    <label>
        <input value="{{$var1}}"><br>
    </label>
    <label>
        <input style="color: {{$color}}" value="{{$var2}}"><br>
    </label>
    <label>
        <input value="{{$var3}}"><br>
    </label>
    <a href= {{$href}}>{{$text}}</a><br>
    date: {{ date('d-m-Y'), time() }}<br>
    <p>{!!$str!!}</p>
</x-layout>
