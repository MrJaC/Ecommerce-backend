<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentSettings;
class PaymentSettingsController extends Controller
{
    public function index(){

        $data = app(PaymentSettings::class)->getDefaultPaymentSettings();
        return view('payment/payment-settings', ['data' => $data]);
    }
    public function addPaymentSettings(Request $request){

    }
}
