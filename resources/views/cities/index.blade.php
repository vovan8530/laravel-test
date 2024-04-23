<?php
/* @var \App\Models\City[] $cities */
?>

<x-layout>
    <x-slot:title>Cities title</x-slot:title>
    @foreach($cities as $city)
        <div>
            <h2>{{$city->title}}</h2>
            <h2>{{$city->population}}</h2>
            <p>{{$city->country->name}}</p>
            <ul>
                @foreach($city->users as $user)
                    <li>{{$user->name}}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</x-layout>
