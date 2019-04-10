<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $suppliers = Product::with('category')->orderBy('id','asc')->get();

        return \response($suppliers);
    }

    public function store(Request $request)
    {
        $supplier = $request->isMethod('put')? Product::findOrFail($request->id):new Product();
        $supplier->product_name = $request->input('product_name');
        $supplier->product_barcode = $request->input('product_barcode');
        $supplier->unit_id = $request->input('unit_id');
        $supplier->supplier_id = $request->input('supplier_id');
        $supplier->category_id = $request->input('category_id');
        $supplier->buying_price = $request->input('buying_price');
        $supplier->selling_price = $request->input('selling_price');
        $supplier->quantity = $request->input('quantity');
        if ($supplier->save()){
            return response($supplier);
        }
    }
    public function destroy(Request $request)
    {
        //
        $data=Product::findOrFail($request->id);

        if ($data->delete()) {
            $data = Product::paginate(10);

            return response($data);
        }
    }
}
