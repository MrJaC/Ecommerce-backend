<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use DB;
class Customers extends Model
{
    public function getCustomers(){
        $customers = DB::select('select * from users');
        return $customers;

    }
    public function getCustomerSingle($id){

        $customer = DB::table('users')->where('id', '=', $id)->get();

        return $customer;
    }
    public function deleteCustomer($id){
        $customer = DB::Table('users')->where('id', '=', $id)->delete();

        if($customer){
            return true;
        }else{
            return false;
        }
    }
}
