<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use DB;
class Staff extends Model
{
    public function getStaff(){
        $staff = DB::table('users')->where('role', '=', 1)->get();
        return $staff;
    }
}
