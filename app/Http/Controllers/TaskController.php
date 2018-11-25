<?php

namespace App\Http\Controllers;
use App\Http\Requests\TaskRequest;
use App\Task;
use App\User;


class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = User::find(\Auth::id())->tasks()->get();

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
