<?php

namespace App\Repositories\Interfaces;


use App\Models\User;
use Illuminate\Http\Request;


interface UserRepositoryInterface
{
    /**
     * @param  array  $data
     * @return User
     */
    public function storeUser(array $data): User;

    /**
     * @param  Request  $request
     * @param  string  $id
     * @return User
     */
    public function updateUser(Request $request, string $id): User;

    /**
     * @param  string  $id
     * @return bool
     */
    public function deleteUser(string $id): bool;
}
