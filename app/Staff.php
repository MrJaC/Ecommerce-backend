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

    public function getStaffData($id){
        $staff = DB::table('users')->where('id', '=', $id)->get();

        return $staff;
    }
    public function deleteStaff($id){
        $query = DB::table('users')->where('id', $id)->delete();
        if($query){
            return true;
        }else{
            return false;
        }
    }
    public function addStaff($data){
        $query = DB::table('users')->insert($data);
        if($query){
            return true;
        }else{
            return false;
        }
    }
    public function editStaff($id,$data){
        $query = DB::table('users')->where('id', $id)->update($data);
        if($query){
            return true;
        }else{
            return false;
        }
    }
    public function checkEmail($data){
        $q = DB::table('users')->where('email', $data)->first();
        error_log(print_r($q,true));
        if($q){
            return true;
        }
    }

}
