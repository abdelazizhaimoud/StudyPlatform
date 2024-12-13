<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'status',
        'duration',
        'user_id',
        'group_id',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function groups(){
        return $this->belongsTo(Group::class);
    }

}
