<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use Illuminate\Support\Facades\Log;

class CCategoriesAPIController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){

        $cat = app(Categories::class)->getCat();

        return response()->json($cat);
    }
}
