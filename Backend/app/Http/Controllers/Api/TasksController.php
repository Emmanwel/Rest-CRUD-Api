<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    //

    public function index()
    {
        $tasks = Task::all();

        return response()->json($tasks);
    }

    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json($task);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status_id' => 'required',
            'due_date' => 'required',


        ]);

        $task = Task::create($validatedData);

        return response()->json($task, 201);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Status not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $task->name = $validatedData['name'];
        $task->description = $validatedData['description'];
        $task->due_date = $validatedData['due_date'];
        $task->status_id = $validatedData['status_id'];
        $task->save();

        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted']);
    }
}
