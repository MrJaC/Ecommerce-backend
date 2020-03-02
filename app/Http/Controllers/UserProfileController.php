<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
        /**
     * Show the profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $hasProfile = false;
        if(app(UserProfile::class)->check($user->id) == true){
            $hasProfile = true;
            $details = app(UserProfile::class)->getDetails($user->id);
            error_log(print_r($details,true));
            return view('profile/profile', [ 'user' => $user, 'hasProfile' => $hasProfile, 'userDetails' => $details]);
        }else{
            return view('profile/profile', [ 'user' => $user, 'hasProfile' => $hasProfile]);
        }


        //return view('profile/profile', [ 'user' => $user, 'hasProfile' => $hasProfile]);
    }
    public function add(Request $request){

        $user = Auth::user()->id;
        $data = array(
            'used_id' => $user,
            'address' => $request->input('address'),
            'landline_number'  => $request->input('landline'),
            'mobile_number' => $request->input('mobile'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'country'  => $request->input('country')        );

        $q = app(UserProfile::class)->add($data);

        if($q == true){
            return view('profile/profile')->with('message', 'Profile added');
        }else{
            return back()->with('message', 'Something went wrong UP1');
        }
    }
    public function edit(Request $request){

        $user = Auth::user()->id;
        $data = array(
            'address' => $request->input('address'),
            'landline_number'  => $request->input('landline'),
            'mobile_number' => $request->input('mobile'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'country'  => $request->input('country')
        );

        $q = app(UserProfile::class)->updateProfile($user->id, $data);

        if($q == true){
            return view('profile/profile')->with('message', 'Profile updated');
        }else{
            return back()->with('message', 'Something went wrong UP2');
        }
    }
}
