<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'department_id',
        'name',
        'city',
        'email',
        'picture'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
  
}
