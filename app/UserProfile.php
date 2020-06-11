<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class UserProfile extends Model
{
    public function add($data)
    {
        $add = DB::table('user_details')->insert($data);
        if ($add) {
            return true;
        } else {
            return false;
        }
    }
    public function check($id){

        if(DB::table('user_details')->where('used_id',$id)->first()){

            return true;
        }else{
            return false;
        }

    }
    public function getDetails($id){
        $q = DB::table('user_details')->where('used_id',$id)->get();

        return $q;

    }
    public function updateProfile($id, $data){
        $q = DB::table('user_details')->where('used_id',$id)->update($data);
        error_log(print_r($q,true));
        if($q == true){
            return true;
        }else{
            return false;
        }
    }

}
