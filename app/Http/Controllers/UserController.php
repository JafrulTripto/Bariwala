<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use App\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{

//    public function __construct()
//    {
//        header("Access-Control-Allow-Origin: *");
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=User::get();
        return \response($data);
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
     * @return UserResource
     */
    public function store(Request $request)
    {

        $user = $request->isMethod('put')? User::findOrFail($request->user_id):new User;

        $user->id = $request->input('id');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password =Hash::make($request->input('password'));
        $user->is_admin = $request->input('is_admin');
        $user->save();

        $resources= new UserResource($user);
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

        if ($user->save() && $userDetails->save()){
            return new UserResource($user);
        }
    }

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
    public function destroy(Request $request)
    {
        //
        $data=User::with('userDetails')->findOrFail($request->id);

        if ($data->delete()) {
            $data = User::paginate(10);

            return UserResource::collection($data);
        }
    }
}
