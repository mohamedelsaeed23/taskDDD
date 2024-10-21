<?php
// app/Domains/Task/Services/TaskService.php

namespace App\Domains\Task\Services;

use App\Domains\Task\Entities\Task;
use App\Domains\Task\Repositories\TaskRepositoryInterface;
use App\Domains\Task\Exceptions\TaskNotFoundException;

class TaskService
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function createTask(string $title, ?string $description, string $status, ?string $dueDate): Task
    {
        $task = new Task(0, $title, $description, $status, $dueDate);
        $this->taskRepository->save($task);

        return $task;
    }

    public function getTaskById(int $id): Task
    {
        return $this->taskRepository->find($id);
    }

    public function deleteTask(int $id): void
    {
        $this->taskRepository->delete($id);
    }

    public function getAllTasks(): array
    {
        return $this->taskRepository->all();
    }
}
