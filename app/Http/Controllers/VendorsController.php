<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
class VendorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
        /**
     * Show the application vendors.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$prod = app(Products::class)->getProducts();
        return view('vendors/vendors');
    }
}
