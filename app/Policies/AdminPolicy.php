<?php

namespace App\Policies;

use App\Enums\RoleTypes;
use App\Models\User;
use Cassandra\Type\UserType;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, User $model): bool
    {
        return $model->role == RoleTypes::ADMIN->value;
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, User $model): bool
    {
    }

    public function delete(User $user, User $model): bool
    {
    }

    public function restore(User $user, User $model): bool
    {
    }

    public function forceDelete(User $user, User $model): bool
    {
    }
}
