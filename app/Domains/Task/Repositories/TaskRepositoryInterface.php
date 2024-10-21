<?php

namespace App\Domains\Task\Repositories;

use App\Domains\Task\Entities\Task;

interface TaskRepositoryInterface
{
    public function find(int $id): ?Task;
    public function save(Task $task): void;
    public function delete(int $id): void;
    public function all(): array;
}