<?php
// app/Infrastructure/Persistence/Eloquent/TaskRepository.php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domains\Task\Entities\Task as DomainTask;
use App\Domains\Task\Repositories\TaskRepositoryInterface;
use App\Domains\Task\Exceptions\TaskNotFoundException;
use App\Models\Task as EloquentTask;

class TaskRepository implements TaskRepositoryInterface
{
    public function find(int $id): ?DomainTask
    {
        $eloquentTask = EloquentTask::find($id);

        if (!$eloquentTask) {
            throw new TaskNotFoundException();
        }

        return $this->toDomain($eloquentTask);
    }

    public function save(DomainTask $task): void
    {
        EloquentTask::updateOrCreate(
            ['id' => $task->getId()],
            [
                'title' => $task->getTitle(),
                'description' => $task->getDescription(),
                'status' => $task->getStatus(),
                'due_date' => $task->getDueDate(),
            ]
        );
    }

    public function delete(int $id): void
    {
        if (!EloquentTask::destroy($id)) {
            throw new TaskNotFoundException();
        }
    }

    public function all(): array
    {
        $eloquentTasks = EloquentTask::all();

        return $eloquentTasks->map(fn($eloquentTask) => $this->toDomain($eloquentTask))->toArray();
    }

    private function toDomain(EloquentTask $eloquentTask): DomainTask
    {
        return new DomainTask(
            $eloquentTask->id,
            $eloquentTask->title,
            $eloquentTask->description,
            $eloquentTask->status,
            $eloquentTask->due_date
        );
    }
}
