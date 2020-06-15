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
    //update mobile
    public function updateMobile(Request $request){
        $id = $request->id;
        //$user_id = $request->user_id;
        $data = array(
            'mobile_number' => $request->mobile
        );
        error_log(print_r($data,true));
        error_log(print_r($id,true));
        $updateAddress = app(UserProfile::class)->updateProfile($id, $data);
        if ($updateAddress == true) {
            return response()->json([
                'status' => 'Good',
                'message' => 'Mobile number updated'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed Mobile number update, try again'
            ], 201);
        }
    }
    //update landline
    public function updateLandline(Request $request){
        $id = $request->id;
        //$user_id = $request->user_id;
        $data = array(
            'landline_number' => $request->landline
        );
        error_log(print_r($data,true));
        error_log(print_r($id,true));
        $updateAddress = app(UserProfile::class)->updateProfile($id, $data);
        if ($updateAddress == true) {
            return response()->json([
                'status' => 'Good',
                'message' => 'Landline number updated'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Landline number update, try again'
            ], 201);
        }
    }
    public function updateName(Request $request){
        $user_id = $request->user_id;
        $data = array(
            'name' => $request->name
        );

        $updateAddress = app(UserProfile::class)->updateUName($user_id,$data);
        if ($updateAddress == true) {
            return response()->json([
                'status' => 'Good',
                'message' => 'Name updated'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed Name update, try again'
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
