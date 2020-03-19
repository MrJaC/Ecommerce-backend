<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Staff;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = app(Staff::class)->getStaff();
        //error_log(print_r($data,true));
        return view('staff/staff', ['staff' => $data]);
    }
    public function delete(Request $request)
    {
        $staff = app(Staff::class)->deleteStaff($request->id);
        if ($staff == true) {
            return redirect('/staff')->with('message', 'Staff deleted');
        } else {
            return back()->with('message', 'Failed staff delete');
        }
    }
    public function staffEdit($id, $name)
    {
        $staffData = app(Staff::class)->getStaffData($id);

        return view('staff/edit-staff', ['id' => $id, 'name' => $name, 'data' => $staffData]);
    }
    public function create()
    {
        return view('staff/create-staff');
    }
    public function addStaff(Request $request)
    {

        //Check email exists
        $staffCheck =  app(Staff::class)->checkEmail($request->input('email'));
        $data = array(
            'name' => $request->input('staff-name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role')
        );
        if ($staffCheck != true) {
            app(Staff::class)->addStaff($data);
            return redirect('/staff')->with('message', 'Staff Added');
        } else {
            return back()->with('message', 'Email already exists!');
        }
    }
}
