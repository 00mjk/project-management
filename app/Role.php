<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $fillable = ['name'];

    public function people()
    {
        return $this->belongsToMany('App\Person');
    }
}
