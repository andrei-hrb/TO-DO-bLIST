<?php

namespace App\Http\Controllers;
use App\Task;
use App\Http\Requests\TaskRequest;


class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::getTasks(auth()->id());

        return view('tasks.index', compact('tasks'));
    }

    public function store(TaskRequest $taskRequest)
    {
        $task = Task::create($taskRequest->all());

        return response()->json($task->id);
    }

    public function destroy(Task $task)
    {
        $task->delete();
    }
}
