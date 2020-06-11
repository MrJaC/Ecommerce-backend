<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use DB;
class Orders extends Model
{
    //display order data

    public function getOrders(){
        $query = DB::table('orders')->select(
            'orders.order_id',
            'orders.product_id',
            'orders.total_price',
            'orders.order_time',
            'orders.user_id',
            'users.id',
            'users.name',
            'users.email',
            'products.prod_id',
            'products.vendor_id',
            'products.product_name',
            'products.product_sku',
            ''
        )
        ->leftJoin('users', 'orders.user_id', '=', 'users.id')
        ->leftJoin('products', 'orders.product_id', '=', 'products.prod_id')->get();

        return $query;
    }
}
