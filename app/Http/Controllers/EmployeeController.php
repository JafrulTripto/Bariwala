<?php

namespace App\Http\Controllers;

use App\Address;
use App\Employee;
use App\Employee_designation;
use App\Employee_image;
use App\Employees_address;
use App\Http\Resources\UserResource;
use App\Image;
use App\UserDetails;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $employee = new Employee();

        $employee->employees_first_name = $request->input('first_name');
        $employee->employees_last_name = $request->input('last_name');
        $employee->employees_dob = $request->input('date_of_birth');

        if ($employee->save()){

            $address = new Address();
            $address->address_postal_code = $request->input('postal_code');
            $address->address_house_no = $request->input('house_no');
            $address->address_road_no = $request->input('road_no');
            $address->address_thana = $request->input('thana');
            $address->address_district = $request->input('district');
            $address->save();

            $image = new Image();
            $file_data = $request->input('image');
            //generating unique file name;
            $file_name = 'image_'.time().'.png';
            $image_data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $file_data));
            if($file_data!=""){
                // storing image in storage/app/public Folder
                \Storage::disk('public')->put($file_name,$image_data);
            }
            $image->image_link = $file_name;
            $emp_image = new Employee_image();
            $emp_address = new Employees_address();
            $emp_address->address_address_id = $address->id;
            $emp_designation = new Employee_designation();
            $emp_designation->employee_designation_name = $request->input('designation');
            $emp = Employee::findOrFail($employee->id);
            $emp->designation()->save($emp_designation);
            $emp->save_address()->save($emp_address);
            //$emp->save_image()->save($emp_image);
        }

    }
/*
        $resources= new UserResource($employee);
        $userDetails = new UserDetails;

        $file_data = $request->input('image');
        //generating unique file name;
        $file_name = 'image_'.time().'.png';

        $image_data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $file_data));

        if($file_data!=""){
            // storing image in storage/app/public Folder
            \Storage::disk('public')->put($file_name,$image_data);
        }
        $userDetails->image = $file_name;
        $userDetails->user_id = $resources->id;
        $userDetails->designation = $request->input('designation');
        $userDetails->address = $request->input('address');
        $userDetails->phn_no = $request->input('phn_no');
        $userDetails->NID_no = $request->input('NID_no');
        $userDetails->date_of_birth = $request->input('date_of_birth');

        $userDetails->save();

        if ($employee->save() && $userDetails->save()){
            return new UserResource($employee);
        }
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
