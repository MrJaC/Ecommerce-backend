<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class VendorProfile extends Model
{
    public function add($data){

        $query = DB::table('vendors')->insert($data);
        if($query){
            return true;
        }
        else{
            return false;
        }

    }


}
