<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domains\Task\Repositories\TaskRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\TaskRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
