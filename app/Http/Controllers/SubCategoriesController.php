<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the subcategories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('subcategories/subcategories');
    }
}
