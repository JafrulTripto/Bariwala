<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        'NID_no',
    ];
}
