<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BaseController as BaseController;

class RegisterController extends BaseController
{
    //

    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:4',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password',

            ]
        );

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        $password = bcrypt($request->password);

        $user  = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $success['token'] = $user->createToken('RestApi')->plainTextToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User Registered Successfully');
    }
    //End

    public function login(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        if ($validator->fails()) {

            return  $this->sendError('Validation Error', $validator->errors());
            //     return response()->json([
            //         'status' => false,
            //         'message' => 'validation error',
            //         'errors' => $validateUser->errors()
            //     ], 401);
            // }



            // if (!Auth::attempt($request->only(['email', 'password']))) {
            //     return response()->json([
            //         'status' => false,
            //         'message' => 'Email & Password does not match with our record.',
            //     ], 401);
            // }

            if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                $success['token'] = $user->createToken('RestApi')->plainTextToken;
                $success['name'] = $user->name;
                return $this->sendResponse($success, 'User Logged In Successfully');
            }
        } else {
            return $this->sendError('unauthorized', ['error' => 'Unauthorized']);
        }
    }

    public function logout()
    {

        auth()->user()->tokens()->delete();

        return $this->sendResponse([], 'User Logged Out ');
    }
}