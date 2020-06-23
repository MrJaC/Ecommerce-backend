<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;


class PrivacyController extends Controller
{
    public function __construct()
    {

    }
    public function privacy(){
        return view('policy/privacy');
    }
}
