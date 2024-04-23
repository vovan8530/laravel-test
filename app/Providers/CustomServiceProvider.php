<?php

namespace App\Providers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
//    protected array $repositories = [
//        UserRepositoryInterface::class => UserRepository::class
//    ];

    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class);
    }

    public function boot(): void
    {
    }
}
