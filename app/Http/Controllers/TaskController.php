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
        $tasks = Task::where('user_id', auth()->id())->get();

        return view('index', compact('tasks'));
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
