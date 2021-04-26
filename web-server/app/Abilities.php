<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abilities extends Model
{
    protected $guarded = [];

    public function role(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
