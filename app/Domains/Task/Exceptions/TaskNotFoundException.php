<?php

namespace App\Domains\Task\Exceptions;

use Exception;

class TaskNotFoundException extends Exception
{
    protected $message = 'Task not found.';
}