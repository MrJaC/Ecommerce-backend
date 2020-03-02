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
}
