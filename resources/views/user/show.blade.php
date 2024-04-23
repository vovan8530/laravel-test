<?php
/* @var \App\Models\User $user */
?>

<x-layout>
    <x-slot:title>
        User show
    </x-slot:title>
    <h2>User</h2>
    <p>id - {{$user->id}}</p><br>
    <p>name - {{$user->name}}</p><br>
    <p>age - {{isset($user->age)}}</p><br>
    <p>salary - {{$user->salary}}</p><br>
    <p>email - {{$user->email}}</p><br>
    <p>city - {{$user->city->title}}</p><br>
</x-layout>
