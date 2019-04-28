<?php

namespace App\Http\Controllers;

use App\Employee_designation;
use Illuminate\Http\Request;

class Employee_designationController extends Controller
{
    public function index()
    {
        $designation = Employee_designation::select('id','designation_name')->orderBy('id','asc')->get();

        return \response($designation);
    }

    public function store(Request $request)
    {
        $newDesignation =new Employee_designation();
        $newDesignation->designation_name = $request->input('designation_name');
        if ($newDesignation->save()){
            return response($newDesignation);
        }
    }

    public function destroy(Request $request)
    {
        //
        $data = EmpRole::findOrFail($request->id);

        if ($data->delete()) {
            $data = EmpRole::paginate(10);

            return response($data);
        }
    }
}
