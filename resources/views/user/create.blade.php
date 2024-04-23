<?php
/**@var App\Models\User $user */
?>

<x-layout>
    <x-slot:title>Create title</x-slot:title>

    <h3>Form save user</h3>

    {{--    @dd($user)--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          @if(isset($user) && $user->exists)
              action="{{ route('users.update', ['user' => $user]) }}"
          @else
              action="{{ route('users.store') }}"

          @endif
          class="form-example">
        @csrf
        @if(isset($user) && $user->exists)
            @method('PUT')
        @endif


        <div class="form-example">
            <label>
                Name:
                <input name="name" value="@isset($user->name){{$user->name}}@endisset" required>
            </label>
        </div>
        <div class="form-example">
            <label>
                Age:
                <input name="age" value="@isset($user->age){{$user->age}}@endisset" required>
            </label>
        </div>
        <div class="form-example">
            <label>
                City id:
                <input name="city_id" value="@isset($user->city_id){{$user->city_id}}@endisset" required>
            </label>
        </div>
        <div class="form-example">
            <label>
                Salary:
                <input name="salary" value="@isset($user->salary){{$user->salary}}@endisset" required>
            </label>
        </div>
        <div class="form-example">
            <label>
                Email:
                <input name="email" value="@isset($user->email){{$user->email}}@endisset" required>
            </label>
        </div>
        <div class="form-example">
            <label>
                Password:
                <input name="password" type="password" required>
            </label>
        </div>

        <button>Save</button>
    </form>

</x-layout>
