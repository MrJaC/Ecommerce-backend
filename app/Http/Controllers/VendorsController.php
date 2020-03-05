<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use App\Vendor;
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
        $vendors = app(Vendor::class)->getVendors();
        return view('vendors/vendors',['vendors' => $vendors]);
    }
    public function edit($id,$name){
        return view('vendor/edit-vendor', ['id' => $id, 'name' => $name]);
    }
    public function delete(Request $request){
        $v = app(Vendor::class)->deleteVendor($request->id);
        if($v == true){
            return redirect('/vendors')->with('message', 'Vendor deleted');
        }
        else{
            return back()->with('message', 'Failed vendor delete');
        }
    }

    public function create(){
        return view('vendor/create-vendor');
    }
}
