<?php

namespace App\Models;

use App\Models\Task;
use App\Models\User;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserTask extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'task_id', 'status_id', 'remarks', 'start_time', 'end_time', 'due_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
