<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categories;
class CategoryAPIController extends Controller
{
    public function index(){

        $cat = app(Categories::class)->getCat();

        return response()->json($cat);
    }
}
