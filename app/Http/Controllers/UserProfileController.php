<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
       // $customers = app(Customers::class)->getCustomers();
        //Log::debug('Customers', ['customers' => $customers]);
        return view('profile/profile');
    }
}
