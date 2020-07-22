<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = app(Orders::class)->getOrders();

        return view('orders/orders', ['data' => $data]);
    }



}
