<?php

namespace App\Http\Controllers;
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
}
