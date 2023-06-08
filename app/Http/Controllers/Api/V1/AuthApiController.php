<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class AuthApiController extends Controller
{
    /**
     * User Register
     */
    public function register(Request $request)
    {
        //dd(2);

        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required'
            ]);
        if($validator->fails()){
            $errors = $validator->errors();
            return [
                'status'=> false,
                'message'=> $validator->errors()->first(),
                'data'=> []
            ];
        }
        // save
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return  [
            'status'=> true,
            'message'=> 'User has been sucessfully register',
            'data' => $user
        ];
    }

    /**
     * User login
     */
    public function login(Request $request){
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        if (!auth()->attempt($data)) {
            return [
                'status'=> false,
                'message' => 'Username and password are incorrect',
                'data' => []
            ];
        }
        $token = auth()->user()->createToken('API Token')->accessToken;
        return [
            'status'=> true,
            'message'=> 'User has been sucessfully login',
            'data' => [
                'name'=> auth()->user()->name,
                'email'=> auth()->user()->email,
                'user_phone'=> auth()->user()->user_phone,
                'token' => $token

            ],

        ];
    }

}
