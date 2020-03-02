<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Products;
use App\SubCategories;
use Illuminate\Support\Facades\Auth;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*
         Get all data

        */
        $cat = app(Categories::class)->getCat();
        $prod = app(Products::class)->getProducts();
        $subcat = app(SubCategories::class)->getData();
        $users = DB::table('users')->get();
        return view('dashboard/dashboard',
    [
        'cat' => $cat,
        'subcat' => $subcat,
        'product' => $prod,
        'users' => $users

    ]);
    }


}
