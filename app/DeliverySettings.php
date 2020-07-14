<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class DeliverySettings extends Model
{
    public function getAllDeliverySettings(){
        $query = DB::select('select * from delivery_settings');

        return $query;
    }
}
