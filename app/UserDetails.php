<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserDetails
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetails query()
 * @mixin \Eloquent
 */
class UserDetails extends Model
{
    //
    protected $fillable = [
        'image','occupation', 'house_no	', 'road_no','thana','District','NID_no','date_of_birth'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


}
