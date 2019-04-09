<?php

namespace App\Http\Controllers;


use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    //
    public function index()
    {
        $units = Unit::select('id','unit_name')->orderBy('id','asc')->get();

        return \response($units);
    }

    public function store(Request $request)
    {
        $newUnit = $request->isMethod('put')? Unit::findOrFail($request->id):new Unit();
        $newUnit->unit_name = $request->input('unit_name');
        if ($newUnit->save()){
            return response($newUnit);
        }
    }
    public function destroy(Request $request)
    {
        //
        $data=Unit::findOrFail($request->id);

        if ($data->delete()) {
            $data = Unit::paginate(10);

            return response($data);
        }
    }

}
