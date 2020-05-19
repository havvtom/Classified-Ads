<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Area;

class AreaController extends Controller
{
    public function store(Area $area)
    {
    	Session::put('area', $area->slug);    	

    	return redirect()->route('category.index', [$area]);
    }
}
