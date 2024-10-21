<?php

namespace App\Domains\Task\Entities;

class Task
{
    private int $id;
    private string $title;
    private ?string $description;
    private string $status;
    private ?string $dueDate;

    public function __construct(int $id, string $title, ?string $description, string $status, ?string $dueDate)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->dueDate = $dueDate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getDueDate(): ?string
    {
        return $this->dueDate;
    }

    // Additional methods for business logic can be added here
}
