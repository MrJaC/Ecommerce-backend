<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserProfile;

class UsersAPIController extends Controller
{
    public function getUserAddresses(Request $request)
    {
        $user_id = $request->id;

        $userData = app(UserProfile::class)->getDetails($user_id);

        if (app(UserProfile::class)->getDetails($user_id)->isEmpty()) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'No user data',
                'data' => 0
            ], 201);
        } else {
            return response()->json([
                'status' => 'Good',
                'message' => 'Got user data',
                'data' => $userData
            ], 201);
        }
    }

    //update address

    public function updateAddress(Request $request)
    {

        $details_id = $request->details_id;
        //$user_id = $request->user_id;
        $data = array(
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country
        );
        error_log(print_r($data,true));
        error_log(print_r($details_id,true));
        $updateAddress = app(UserProfile::class)->updateUserAddress($details_id, $data);
        if ($updateAddress == true) {
            return response()->json([
                'status' => 'Good',
                'message' => 'Address updated'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed Address update, try again'
            ], 201);
        }
    }
    //add user address
    public function addUserAddress(Request $request){
        //$details_id = $request->details_id;
        $user_id = $request->used_id;
        $data = array(
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'used_id' => $user_id
        );
        error_log(print_r($data,true));
        error_log(print_r($user_id,true));
        $updateAddress = app(UserProfile::class)->add($data);
        if ($updateAddress == true) {
            return response()->json([
                'status' => 'Good',
                'message' => 'Address updated'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed Address update, try again'
            ], 201);
        }
    }
    public function deleteAddress(Request $request){
        $details_id = $request->details_id;
        error_log(print_r($details_id,true));

        $deleteAddress = app(UserProfile::class)->deleteUserAddress($details_id);
        if ($deleteAddress == true) {
            return response()->json([
                'status' => 'Good',
                'message' => 'Address deleted'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed to delete address , try again'
            ], 201);
        }
    }

}
