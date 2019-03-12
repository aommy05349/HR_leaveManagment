<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveTypes extends Model
{
    public function users(){
        return $this->hasMany('App\Models\Users');
    }
}
