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
        CrudUser::create([
            'username' => $request->username,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ]);
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
        $data = CrudUser::find($id);

        $data->username = $request->username;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->save();
    }


    public function destroy($id)
    {
        $data = CrudUser::find($id);
        $data->delete();

    }
}

