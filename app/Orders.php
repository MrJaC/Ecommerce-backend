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
            'orders.vendor_id',
            'users.id',
            'users.name',
            'users.email',
            'products.prod_id',
            'products.vendor_id',
            'products.product_name',
            'products.product_sku',
            'vendors.id',
            'vendors.vendor_business_name'

        )
        ->leftJoin('users', 'orders.user_id', '=', 'users.id')
        ->leftJoin('products', 'orders.product_id', '=', 'products.prod_id')
        ->leftJoin('vendors', 'orders.vendor_id', '=' , 'vendors.id')
        ->get();

        return $query;
    }

    public function getMyVendorOrders($id){
        $query = DB::table('orders')->select(
            'orders.order_id',
            'orders.product_id',
            'orders.total_price',
            'orders.order_time',
            'orders.user_id',
            'orders.vendor_id',
            'users.id',
            'users.name',
            'users.email',
            'products.prod_id',
            'products.vendor_id',
            'products.product_name',
            'products.product_sku',

        )
        ->leftJoin('users', 'orders.user_id', '=', 'users.id')
        ->leftJoin('products', 'orders.product_id', '=', 'products.prod_id')
        ->where('orders.vendor_id', '=', $id)
        ->get();

        return $query;
    }
}
