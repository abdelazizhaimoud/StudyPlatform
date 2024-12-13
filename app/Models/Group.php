<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Group extends Model
{
    //
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'size',
        'description',
    ];


    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
