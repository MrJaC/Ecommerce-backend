<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use DB;
class Customers extends Model
{
    public function getCustomers(){
        $customers = DB::select('select * from users');
        Log::debug('Model C', $customers);
        return $customers;

    }
}
