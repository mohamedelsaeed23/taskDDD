<?php

namespace App\Http\Controllers;

use App\Domains\Task\Services\TaskService;
use Illuminate\Http\Request;
use App\Domains\Task\Exceptions\TaskNotFoundException;

class TaskController extends Controller
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $task = $this->taskService->createTask(
            $request->input('title'),
            $request->input('description'),
            $request->input('status'),
            $request->input('due_date')
        );

        return response()->json(['message' => 'Task created successfully', 'task' => $task]);
    }

    public function show($id)
    {
        try {
            $task = $this->taskService->getTaskById($id);
            return response()->json($task);
        } catch (TaskNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $this->taskService->deleteTask($id);
            return response()->json(['message' => 'Task deleted successfully']);
        } catch (TaskNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
