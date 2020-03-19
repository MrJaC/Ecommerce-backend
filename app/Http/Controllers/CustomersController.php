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
     * Show the customers
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = app(Customers::class)->getCustomers();

        return view('customers/customers', ['customers' => $customers]);
    }
    public function create()
    {
        return view('customers/create-customers');
    }
    public function editCustomer($id, $name)
    {

        $data = app(Customers::class)->getCustomerSingle($id);


        return view('customers/edit-customer', ['id' => $id, 'data' => $data, 'name' => $name]);
    }
    public function deleteCus($id)
    {

        $q = app(Customers::class)->deleteCustomer($id);

        if ($q) {
            return redirect('customers')->with('message', 'Customer Deleted');
        } else {
            return back()->with('message', 'Error, CD1');
        }
    }
    public function updateCustomer(Request $request)
    {
    }
}
