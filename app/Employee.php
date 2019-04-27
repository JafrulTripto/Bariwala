<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_first_name', 'employee_last_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
    public function save_address(){
        return $this->hasOne('App\Employees_Address','employees_employees_id');
    }
    public function save_image(){
        return $this->hasOne('App\Employee_image');
    }
    public function designation(){
        return $this->hasOne('App\Employee_designation');
    }
}
