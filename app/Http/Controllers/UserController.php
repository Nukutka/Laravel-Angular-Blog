<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;

class UserController extends Controller
{
    private $successStatus  =   200;

    public function registerUser(UserRegisterRequest $request) 
    {
        $request->validated();
        $input = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        );

        // check if email already registered
        $user = User::where('email', $request->email)->first();
        if(!is_null($user)) {
            $data['message'] = "Email is already registered";
            return response()->json(['success' => false, 'status' => 'failed', 'data' => $data]);
        }

        $user = User::create($input);         
        $success['message'] = "Successfully";

        return response()->json( [ 'success' => true, 'user' => $user ] );
    }

    public function loginUser(UserLoginRequest $request) 
    {
        $request->validated();
        if(Auth::guard('web')->attempt(['email' => request('email'), 'password' => request('password')])) {

            $user = Auth::guard('web')->user();

            $token = $user->createToken('token')->accessToken;
            $success['success'] = true;
            $success['message'] = "Success! you are logged in successfully";
            $success['user_name'] = $user->name;
            $success['user_id'] = $user->id;
            $success['token'] = $token;

            return response()->json(['success' => $success ], $this->successStatus);
        }

        else {
            return response()->json(['error'=>'Unauthorized'], 401);
        }
    }
}