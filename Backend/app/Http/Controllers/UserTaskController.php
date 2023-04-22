<?php

namespace App\Http\Controllers;

use App\Models\UserTask;
use Illuminate\Http\Request;

class UserTaskController extends Controller
{
    /**
     * Store a new user task in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'task_id' => 'required|integer',
            'status_id' => 'required|integer',
            'remarks' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'due_date' => 'required',
        ]);

        $userTask = UserTask::create($validatedData);

        return response()->json([
            'message' => 'User task created successfully.',
            'data' => $userTask,
        ], 201);
    }


    public function index()
    {
        $userTask = UserTask::all();

        return response()->json($userTask);
    }

    public function show($id)
    {
        $userTask = UserTask::find($id);

        if (!$userTask) {
            return response()->json(['message' => 'User Task Not found'], 404);
        }

        return response()->json($userTask);
    }



    public function update(Request $request, $id)
    {
        $userTask = UserTask::find($id);

        if (!$userTask) {
            return response()->json(['message' => 'User Task Not found'], 404);
        }

        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'task_id' => 'required|integer',
            'status_id' => 'required|integer',
            'remarks' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'due_date' => 'required',
        ]);

        $userTask->user_id = $validatedData['user_id'];
        $userTask->task_id = $validatedData['task_id'];
        $userTask->status_id = $validatedData['status_id'];
        $userTask->remarks = $validatedData['remarks'];
        $userTask->start_time = $validatedData['start_time'];
        $userTask->end_time = $validatedData['end_time'];
        $userTask->due_date = $validatedData['due_date'];
        $userTask->save();

        return response()->json($userTask);
    }

    public function destroy($id)
    {
        $userTask = UserTask::find($id);

        if (!$userTask) {
            return response()->json(['message' => 'Status not found'], 404);
        }

        $userTask->delete();

        return response()->json(['message' => 'Status deleted']);
    }
}
