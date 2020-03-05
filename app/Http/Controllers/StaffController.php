<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;


class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = app(Staff::class)->getStaff();

        return view('staff/staff', ['staff'=> $data]);
    }
    public function delete($id){

    }
    public function edit($id){

    }
    public function create($id){}
}
