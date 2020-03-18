<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Staff;
use App\User;


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
    public function delete($id)
    {
       $staff = DB::delete('delete users where id = ?', [$id]);

        if($staff == true){
            return redirect('/staff')->with('message', 'Staff deleted');
        }
        else{
            return back()->with('message', 'Failed staff delete');
        }
    }
    public function edit($id)
    {
        return view('staff/edit-staff');
    }
    public function create()
    {
        return view('staff/create-staff');
    }
}
