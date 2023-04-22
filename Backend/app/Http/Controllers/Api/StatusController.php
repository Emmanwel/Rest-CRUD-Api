<?php

namespace App\Http\Controllers\Api;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    //

    public function index()
    {
        $statuses = Status::all();

        return response()->json($statuses);
    }

    public function show($id)
    {
        $status = Status::find($id);

        if (!$status) {
            return response()->json(['message' => 'Status not found'], 404);
        }

        return response()->json($status);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:statuses|max:255',
        ]);

        $status = Status::create($validatedData);

        return response()->json($status, 201);
    }

    public function update(Request $request, $id)
    {
        $status = Status::find($id);

        if (!$status) {
            return response()->json(['message' => 'Status not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|unique:statuses|max:255',
        ]);

        $status->name = $validatedData['name'];
        $status->save();

        return response()->json($status);
    }

    public function destroy($id)
    {
        $status = Status::find($id);

        if (!$status) {
            return response()->json(['message' => 'Status not found'], 404);
        }

        $status->delete();

        return response()->json(['message' => 'Status deleted']);
    }
}