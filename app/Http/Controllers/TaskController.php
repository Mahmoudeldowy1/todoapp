<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks',compact('tasks'));
    }

    public function store()
    {
        $task =Task::create(request()->validate([
            'task_name' => ['required', 'string', 'max:255']
        ]));

        return redirect()->route('task.index');
    }

    public function edit(Task $task)
    {
        return view('edit',compact('task'));
    }

    public function update(task $task)
    {

        $task->update(request()->validate([
            'task_name' => ['required', 'string', 'max:255']
        ]));
        return redirect()->route('task.index');
    }

    public function destroy(task $task)
    {
        $task->delete();
        return redirect()->route('task.index');
    }

    public function completeTask(Task $task)
    {
        if ($task->completed == false){
            $task->update(['completed'=>true]);
        }else {
            $task->update(['completed'=>false]);
        }
        $task->save();
        return redirect()->route('task.index');
    }
}
