<?php

namespace App\Http\Controllers;

use App\CrudUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CrudUserController extends Controller
{
    public function index()
    {
        $data = CrudUser::all();
        return Response::json($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'username' => 'required',
            'email' => 'required|email|unique:crud_users',
            'mobile' => 'required'
        ];

        $customMessages = [
            'username.required'=>'Username is required',
            'email.required'=>'Email is required',
            'mobile.required'=>'Mobile no is required'
        ];
        $this->validate($request, $rules, $customMessages);

//        $requestData = $request->all();

        CrudUser::create([
            'username' => $request->username,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ]);

        return response::json(['message'=> 'User added successfully']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }


    public function update(Request $request,$id)
    {
        $rules = [
            'username' => 'required',
            'email' => 'required|email|unique:crud_users,email,' . $id,
            'mobile' => 'required'
        ];

        $customMessages = [
            'username.required'=>'Username is required',
            'email.required'=>'Email is required',
            'mobile.required'=>'Mobile no is required'
        ];
        $this->validate($request, $rules, $customMessages);

        $data = CrudUser::find($id);

        $data->username = $request->username;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->save();

        return response::json(['message'=> 'User\'s data has been updated successfully']);
    }


    public function destroy($id)
    {
        $data = CrudUser::find($id);
        $data->delete();

        return response::json(['message'=> 'User has been deleted successfully']);

    }
}

