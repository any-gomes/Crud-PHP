<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    protected $table='task';

    public function relUsers()
    {
        return $this->hasOne('App\Models\User','id','id_user');
    }

    protected $fillable=['title','done', 'id_user'];
}
