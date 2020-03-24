<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banners;
class BannersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $data = app(Banners::class)->getData();

        return view('banners/banners', ['data' => $data]);
    }
}
