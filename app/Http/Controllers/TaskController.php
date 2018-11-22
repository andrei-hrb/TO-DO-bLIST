<?php

namespace App\Http\Controllers;
use App\Task;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();

        return view('index', compact('tasks'));
    }

    public function store()
    {
        $task = Task::create(request()->validate([
            'text' => 'required|max:255'
        ]));

        return response()->json($task->id);
    }

    public function destroy(Task $task)
    {
        $task->delete();
    }
}
