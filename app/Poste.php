<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $table = 'postes';

    public function user_id()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
