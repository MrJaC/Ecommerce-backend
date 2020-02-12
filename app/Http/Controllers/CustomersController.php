<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use Illuminate\Support\Facades\Log;
class CustomersController extends Controller
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
     * Show the categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = app(Customers::class)->getCustomers();
        Log::debug('Customers', ['customers' => $customers]);
        return view('customers/customers', ['customers' => $customers]);
    }
    public function create()
    {
        return view('customers/create-customers');
    }
}
