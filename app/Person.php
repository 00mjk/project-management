<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;

    public $fillable = [
        'name',
        'email'
    ];

    protected $dates = ['deleted_at'];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
