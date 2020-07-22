<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Locations;
class LocationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        //get locations

        $q = app(Locations::class)->getAllLocations();


        return view('locations.view', ['data' => $q]);
    }
}
