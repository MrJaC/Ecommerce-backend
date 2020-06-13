<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserProfile;

class UsersAPIController extends Controller
{
    public function getUserAddresses(Request $request){
        $user_id = $request->id;

        $userData = app(UserProfile::class)->getDetails($user_id);

        if(app(UserProfile::class)->getDetails($user_id)->isEmpty()){
            return response()->json([
                'status' => 'Failed',
                'message' => 'No user data',
                'data' => 0
            ], 201);
        }else{
            return response()->json([
                'status' => 'Good',
                'message' => 'Got user data',
                'data' => $userData
            ], 201);
        }
    }
}
