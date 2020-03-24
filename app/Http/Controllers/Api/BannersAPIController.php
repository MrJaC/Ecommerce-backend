<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Banners;
class BannersAPIController extends Controller
{
    public function index(){

        $data = app(Banners::class)->getBanners();

        return response()->json($data);
    }
}
