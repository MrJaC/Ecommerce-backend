<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categories;
use App\SubCategories;
class SubcategoriesAPIController extends Controller
{
    public function index()
    {
        $data = app(SubCategories::class)->getData();


        return response()->json($data);
    }
}
