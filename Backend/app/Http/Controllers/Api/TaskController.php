<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    //

    public function index()
    {
        $tasks = Task::all();

        // return $this->sendResponse($tasks ->toArray(), 'Tasks Retrived');
        return $this->sendResponse(TaskResource::collection($tasks), 'All Tasks Retrieved');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'status_id' => 'required'

        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $task = Task::create($request->all());
        return $this->sendResponse(new TaskResource($task), 'Task Created Successfully');
    }

    public function show($id)
    {
        $task = Task::find($id);
        if (is_null($task)) {
            return $this->sendError('Task not found.');
        }

        return $this->sendResponse(new TaskResource($task), 'Task Retrieved Successfully');
        // return response()->json([
        //     "success" => true,
        //     "message" => "Task retrieved successfully.",
        //     "data" => $task
        // ]);
    }

    public function update(Request $request, Task $task)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'status_id' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $task->update($request->all());
        return $this->sendResponse(new TaskResource($task), 'Task Updated Successsfully');
        // $task->name = $input['name'];
        // $task->description = $input['detail'];
        // $task->save();
        // return response()->json([
        //     "success" => true,
        //     "message" => "Task updated successfully.",
        //     "data" => $task
        // ]);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return $this->sendResponse(new TaskResource($task), 'Task Deleted Successfully');
        // return response()->json([
        //     "success" => true,
        //     "message" => "Task deleted successfully.",
        //     "data" => $task
        // ]);
    }
}