<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $fillable = [
        'name',
        'size',
        'created_by',
        'description',
    ];
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
