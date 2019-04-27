<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\EmpRole
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EmpRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EmpRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EmpRole query()
 * @mixin \Eloquent
 */
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
