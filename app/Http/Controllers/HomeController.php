<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Area;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Area::whereNotNull('parent_id')->update(['usable'=>true]);
        $areas = Area::get()->toTree();

        return view('home', compact('areas'));
    }
}
