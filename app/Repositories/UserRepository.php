<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserRepository implements UserRepositoryInterface
{


    /**
     * @param  array  $data
     * @return User
     */
    public function storeUser(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'salary' => $data['salary'],
            'age' => $data['age'],
            'city_id' => $data['city_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    /**
     * @param  Request  $request
     * @param  string  $id
     * @return User
     */
    public function updateUser(Request $request, string $id): User
    {
        $data = $request->all();

        $user = User::find($id);

        $user->name = $data['name'];
        $user->age = $data['age'];
        $user->salary = $data['salary'];
        $user->email = $data['email'];
        $user->password = $data['password'];

        $user->save();

        return $user->refresh();
    }

    /**
     * @param  string  $id
     * @return bool
     */
    public function deleteUser(string $id): bool
    {
        return User::find($id)->delete();
    }
}
