<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title', 'deadline', 'description', 'status', 'manager_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tasks', 'task_id', 'user_id');
    }
}
