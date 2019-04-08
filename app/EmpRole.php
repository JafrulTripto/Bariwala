<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpRole extends Model
{
    //
    protected $table = 'roles';

    protected $fillable = [
        'id', 'role_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
