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
        Task::create([
            'text' => request()->text,
        ]);
    }
}
