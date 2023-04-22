<?php

namespace App\Http\Controllers\Api;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SkillResource;
use App\Http\Requests\StoreSkillRequest;

class SkillController extends Controller
{
    //
    public function index()
    {
        return SkillResource::collection(Skill::all());
        // return response()->json("Skills Created ");
    }

    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }


    public function store(StoreSkillRequest $request)
    {
        Skill::create($request->validated());
        return response()->json("Skills Created and Saved to DB");
    }

    public function update(StoreSkillRequest $request, Skill $skill)
    {
        $skill->update($request->validated());
        return response()->json("Skills Updated Succesfully ");
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json("Skills Deleted Succesfully ");
    }
}
