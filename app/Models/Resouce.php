<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resouce extends Model
{
    //
    protected $fillable = [
        'file_name',
        'file_path',
        'uploaded_by',
        'group_id',
    ];
}
