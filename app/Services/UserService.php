<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserService
{
    /**
     * @var UserRepositoryInterface
     */
    protected UserRepositoryInterface $userRepository;

    /**
     * @param  UserRepositoryInterface  $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param  array  $data
     * @return User
     */
    public function storeUser(array $data): User
    {
        return $this->userRepository->storeUser($data);
    }

    /**
     * @param  Request  $request
     * @param  string  $id
     * @return User
     */
    public function updateUser(Request $request, string $id): User
    {
        return $this->userRepository->updateUser($request, $id);
    }

    /**
     * @param  string  $id
     * @return bool
     */
    public function deleteUser(string $id): bool
    {
        return $this->userRepository->deleteUser($id);
    }
}
