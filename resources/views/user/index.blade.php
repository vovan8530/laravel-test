<?php
/**@var App\Models\User[] $users */
/**@var App\Models\User $user */
?>


<x-layout>
    <x-slot:title>
        title users
    </x-slot:title>

    <h2>Users table</h2>

    <div>
        <a href="{{route('users.create')}}">Create new User</a>
    </div>

    <table>
        <tr>
            <th>№</th>
            <th>Name</th>
            <th>City</th>
            <th>Age</th>
            <th>Salary</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach($users['data'] as $user)
            <tr>

                <td>{{resourceGet($user, 'id')}}</td>
                <td>{{resourceGet($user, 'name')}}</td>
                <td>{{resourceGet($user, 'city.title')}}</td>
                <td>{{resourceGet($user, 'age')}}</td>
                <td>{{resourceGet($user, 'salary')}}</td>
                <td>{{resourceGet($user, 'email')}}</td>
                <td>
                    <a href="{{route('users.edit', resourceGet($user, 'id'))}}">Update</a>
                    <form action="{{route('users.destroy', resourceGet($user, 'id'))}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{$paginator->links()}}
</x-layout>
