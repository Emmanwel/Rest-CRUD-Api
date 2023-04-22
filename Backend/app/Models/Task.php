<?php

namespace App\Models;

use App\Models\Status;
use App\Models\UserTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'due_date',
        'status_id',
        'deleted_at'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function userTasks()
    {
        return $this->hasMany(UserTask::class);
    }


}