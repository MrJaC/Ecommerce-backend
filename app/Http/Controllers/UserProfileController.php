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

        Log::debug($user);
        return view('profile/profile', [ 'user' => $user]);
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
            return view('profile/profile', ['user' => $user])->with('message', 'Profile updated');
        }else{
            return back()->with('message', 'Something went wrong UP1');
        }
    }
}
