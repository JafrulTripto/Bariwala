<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use App\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
    }

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
     * @return UserResource
     */
    public function store(Request $request)
    {
        //
        $user = $request->isMethod('put')? User::findOrFail($request->user_id):new User;

        $user->id = $request->input('id');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password =Hash::make($request->input('password'));
        $user->save();

        $resources= new UserResource($user);
        $userDetails = new UserDetails;
        $userDetails->user_id = $resources->id;
        $userDetails->occupation = $request->input('occupation');
        $userDetails->house_no = $request->input('house_no');
        $userDetails->road_no = $request->input('road_no');
        $userDetails->thana = $request->input('thana');
        $userDetails->district = $request->input('district');
        $userDetails->phn_no = $request->input('phn_no');
        $userDetails->NID_no = $request->input('NID_no');
        $userDetails->date_of_birth = $request->input('date_of_birth');

        $userDetails->save();

        /*if ($user->save() && $userDetails->save()){
            return new UserResource($user);
        }*/
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
    public function destroy($id)
    {
        //
    }
}
