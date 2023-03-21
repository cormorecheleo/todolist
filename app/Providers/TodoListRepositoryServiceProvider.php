<?php

namespace App\Providers;

use App\Interfaces\TodoListRepositoryInterface;
use App\Repositories\TodoListRepository;
use Illuminate\Support\ServiceProvider;

class TodoListRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(TodoListRepositoryInterface::class, TodoListRepository::class);
    }
}
