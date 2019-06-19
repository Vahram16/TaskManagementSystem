<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'manager', 'developer'
    ];

    public function users()
    {

        return $this->hasMany(User::class, 'role', 'id');

    }
}
