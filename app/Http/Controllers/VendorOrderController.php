<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id, $name){
        return view('vendors/orders/admin/orders-view', [
            'id' => $id,
            'name' => $name
        ]);
    }
}
