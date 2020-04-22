<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Staff;
use App\UserProfile;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            //'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
            'user_name' => $user->name,
            'user_email' => $user->email,
            'user_role' => $user->role,
            'user_id'=> $user->id

        ]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'fName' => 'required|string',
            'lName' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);
            //laziness
        $staffCheck =  app(Staff::class)->checkEmail($request->input('email'));
        if ($staffCheck != true) {
            $user = new User;
            $user->name = $request->fName . " " . $request->lName;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 3;
            $user->save();
            return response()->json([
                'message' => 'Successfully created user!'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Email Exists'
            ], 201);
        }
    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ],201);
    }
    public function userdetails(Request $request){
        //error_log(print_r($request,true));
        $id = $request->id;
        $data = [
            'address' => $request->address,
            'landline_number' => $request->landline,
            'mobile_number' => $request->mobile,
            'city' => $request->city,
            'state' => $request->province,
            'country' => $request->country
        ];
        $userData = app(UserProfile::class)->updateProfile($id,$data);
        if($userData == true){
            return response()->json([
                'message' => 'Details updated'
            ],201);
        }else{
            return response()->json([
                'message' => 'Something went wrong ERR_UP1'
            ],201);
        }
        error_log(print_r($data,true));
    }
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {

        return response()->json($request->user());
    }
}
