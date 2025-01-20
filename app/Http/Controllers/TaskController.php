<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function index()
    {
        $pendingTasks = Task::where('is_completed', false)->get();
        $completedTasks = Task::where('is_completed', true)->get();
        return view('pages.task.task', compact('pendingTasks', 'completedTasks'));
    }
    public function store(Request $request)
    {

        $task = Task::create([
            'title' => $request->input('title'),
        ]);

        return redirect()->route('task.index')
        ->with('status', 'Task created successfully!');

    }

    // Mark Task as Completed
    public function markAsCompleted($id)
    {
        $task = Task::findOrFail($id);
        $task->update(['is_completed' => true]);
        return redirect()->route('task.index')->with('status', 'Task marked as completed!');

    }
    
}