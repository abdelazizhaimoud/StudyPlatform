<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    //
    public function users(){
        return $this->belongsTo(user::class);
    }
}
