<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $timestamps = false;



public function workers()
    {
        return $this->hasMany(Worker::class);
    }

}
