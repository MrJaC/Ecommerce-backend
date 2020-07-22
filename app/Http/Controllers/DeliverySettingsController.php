<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliverySettings;
use Illuminate\Support\Facades\Auth;

//
class DeliverySettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = app(DeliverySettings::class)->getAllDeliverySettings();


        return view(
            'delivery/settings/view',
            [
                'data' => $data
            ]
        );
    }

    public function addDelSettings(){
        return view('delivery.settings.add');
    }
    public function deladdDelSettings(){}
    public function editDelSettings(){}
}
