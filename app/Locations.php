<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Locations extends Model
{
    //get all Locations
    public function getAllLocations(){
       $query = DB::select('select * from locations');

       return $query;
    }

}
