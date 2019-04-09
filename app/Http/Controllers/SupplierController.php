<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //
    public function index()
    {
        $suppliers = Supplier::select('id','sup_name','sup_email','category','sup_contactPerson','sup_contactPhoneNo')->orderBy('id','asc')->get();

        return \response($suppliers);
    }

    public function store(Request $request)
    {
        $supplier = $request->isMethod('put')? Supplier::findOrFail($request->id):new Supplier();
        $supplier->sup_name = $request->input('name');
        $supplier->sup_email = $request->input('email');
        $supplier->sup_contactPerson = $request->input('contactPerson');
        $supplier->sup_contactPhoneNo = $request->input('phn_no');
        $supplier->category = $request->input('category');
        if ($supplier->save()){
            return response($supplier);
        }
    }
    public function destroy(Request $request)
    {
        //
        $data=Supplier::findOrFail($request->id);

        if ($data->delete()) {
            $data = Supplier::paginate(10);

            return response($data);
        }
    }
}
