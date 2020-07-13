<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\ApiController;

use App\User;

use App\Book;

class UserController extends ApiController
{
    public function index(){

    	//$users = User::all();
    	$users = User::paginate(10);

    	//return response()->json(['data' => $users], 200);
    	return $this->successResponse(['data' => $users], 200);
    }

    public function show($id){

    	$user = User::findOrFail($id);
    	//return response()->json(['data' => $user], 200);
    	return $this->showOne($user);
    }

    public function store(Request $request){

    	$data = $request->all();

    	$rule = [
    		'name' => 'required|string|min:5',
    		'email' => 'required|email|unique:users',
    		'password' => 'required|confirmed|min:6'
    	];

    	//$data = $request->validate($rule);

    	$validator = Validator::make($data, $rule); 

    	if(!$validator->fails()){
            return response()->json(['error' => 'there was an error'], 401);
        }

    	//dd($data['password']);
    	

    	$data['password'] = bcrypt($request->password);

    	$data['verification_token'] = User::generateToken();
    	$data['admin'] = User::REGULAR_USER;

    	$user = User::create($data);

    	$accessToken = $user->createToken('authToken')->accessToken;

    	return response()->json(['data' => $user, 'access_token' => $accessToken], 201);
    }

    

}
