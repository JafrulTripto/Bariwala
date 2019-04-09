<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index()
    {
        $category = Category::select('id','category_name')->orderBy('id','asc')->get();

        return \response($category);
    }

    public function store(Request $request)
    {
        $category = $request->isMethod('put')? Category::findOrFail($request->category_id):new Category;
        $category->category_name = $request->input('category_name');
        if ($category->save()){
            return response($category);
        }
    }
    public function destroy(Request $request)
    {
        //
        $data=Category::findOrFail($request->id);

        if ($data->delete()) {
            $data = Category::paginate(10);

            return response($data);
        }
    }
}
