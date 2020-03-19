<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\Subcategories;
use App\Vendor;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
class ProductsAPIController extends Controller
{
    public function index()
    {
        $prod = app(Products::class)->getProducts();
        return response()->json($prod);
    }
}
