<?php

namespace App\Http\Controllers;

use App\EmpRole;
use App\Http\Resources\UserResource;
use App\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    //

    public function index()
    {
        $roles = EmpRole::select('id','role_name')->orderBy('id','asc')->get();

        return \response($roles);
    }

    public function store(Request $request)
    {
        $newRole = $request->isMethod('put')? EmpRole::findOrFail($request->user_id):new EmpRole;
        $newRole->role_name = $request->input('role_name');
        if ($newRole->save()){
            return response($newRole);
        }
    }

    public function destroy(Request $request)
    {
        //
        $data=EmpRole::findOrFail($request->id);

        if ($data->delete()) {
            $data = EmpRole::paginate(10);

            return response($data);
        }
    }
}
