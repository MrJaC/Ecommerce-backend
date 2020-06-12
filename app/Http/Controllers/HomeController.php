<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Products;
use App\SubCategories;
use App\Vendor;
use App\Orders;
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


        if(Auth::user()->role == 1){

            $cat = app(Categories::class)->getCat();
            $prod = app(Products::class)->getProducts();
            $subcat = app(SubCategories::class)->getData();
            $orders = app(Orders::class)->getOrders();
            $user = DB::table('users')->get();

            return view('dashboard/dashboard',
            [
                'cat' => $cat,
                'subcat' => $subcat,
                'product' => $prod,
                'users' => $user,
                'data' => $orders

            ]);
        }elseif(Auth::user()->role == 4){

            //getting vendor data


            $prod = app(Vendor::class)->getMyVendorProducts(Auth::user()->id);

            $user = DB::table('users')->get();
            return view('dashboard/vendor/dashboard',
            [

                'product' => $prod,
                'users' => $user

            ]);
        }



    }


}
