<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class PaymentSettings extends Model
{
    //
    public function getDefaultPaymentSettings(){
        $query = DB::select('select * from payment_settings');
        return $query;
    }
    public function addPaymentSettings($data){
        if($query = DB::table('payment_settings')->insert($data)){
            return true;
        }else{
            return false;
        }
    }
}
